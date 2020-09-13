import {Loader} from './Loader.js';
import Map from './Map.js';
import Keyboard from './Keyboard.js';
import Player from './Player.js';
import Camera from './Camera.js';
import TreeMonster from './Monsters/TreeMonster.js';
import Sound from './Sound.js';

class Game {

  constructor() {
    this.canvas = document.getElementById('canvas');
    this.canvas.width = window.innerWidth;
    this.canvas.height = window.innerHeight;
    this.ctx = this.canvas.getContext('2d');
    this.previousElapsed = 0;
    this.keyboard = new Keyboard();
    this.players = [];
    this.themeSong = new Sound('./assets/audio/theme.mp3');
    this.themeSong.sound.volume = .5;
    this.gameStarted = false;
    Promise.all([Loader.loadImage('tiles', 'assets/SpriteSheet.png')]).then(loaded => {
      //this.connection = new WebSocket('ws://localhost:8081');
      this.connection = new WebSocket('wss://techdesign.io/wss/');
      this.connection.onmessage = (e) => {
        this.onMessageHandler(JSON.parse(e.data));
      };
    });
  }

  onMessageHandler(data) {
    if (data.action == 'initialUpdate') {
      this.initialUpdate(data);
      setTimeout(() => this.themeSong.play(), 5000);
    }

    if (data.action == 'update') {
      this.updateFromServer(data);
    }

    if (data.action == 'registerPlayer') {
      this.registerPlayer(data);
    }

    if (data.action == 'playerDisconnected') {
      this.playerDisconnected(data);
    }
  }

  playerDisconnected(data) {
    if (this.players.length > 0) {
      this.players = this.players.filter(player => player.id != data.id);
    }
  }

  registerPlayer(data) {
    let registered = false;
    for (let i = 0; i < this.players.length; i++) {
      if (this.players[i].id == data.id) {
        registered = true;
      }
    }
    if (!registered) {
      this.players.push(new Player(
        this.map,
        data.x,
        data.y,
        data.id
      ));
    }
  }

  initialUpdate(data) {
    this.map = new Map(
      data.columns,
      data.rows,
      data.tileSize
    );
    this.map.setSprites(data.map.sprites);
    this.map.setLayers(
      data.map.background,
      data.map.backgroundDecoration,
      data.map.foreground
    );
    this.keyboard.listenForEvents(
      [this.keyboard.left, this.keyboard.right, this.keyboard.up, this.keyboard.down, this.keyboard.spacebar]
    );
    this.tileAtlas = Loader.getImage('tiles');
    this.player = new Player(
      this.map,
      data.player.x,
      data.player.y,
      data.id
    );
    data.players.forEach(player => {
      this.players.push(new Player(
        this.map,
        player.x,
        player.y,
        player.id
      ));
    });
    /*this.treeMonster = new TreeMonster(
      this.map,
      data.player.x + 100,
      data.player.y + 10
    );*/
    this.camera = new Camera(this.map, this.canvas.width, this.canvas.height);
    this.camera.follow(this.player);
    window.requestAnimationFrame(timestamp => this.tick(timestamp));
  }

  tick(elapsed) {
    // clear previous frame
    this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

    // compute delta time in seconds -- also cap it
    let delta = (elapsed - this.previousElapsed) / 1000.0;
    delta = Math.min(delta, 0.25); // maximum delta of 250 ms
    this.previousElapsed = elapsed;

    this.update(delta);
    this.render();

    window.requestAnimationFrame(timestamp => this.tick(timestamp));
  }

  updateFromServer(data) {
    data.states.forEach(player => {
      if (this.player.id == player.id) {
        this.player.x = player.x;
        this.player.y = player.y;
        this.player.down = player.down;
        this.player.left = player.left;
        this.player.up = player.up;
        this.player.right = player.right;
        this.player.attack = player.attack;
      } else {
        for (let i = 0; i < this.players.length; i++) {
          if (this.players[i].id == player.id) {
            this.players[i].x = player.x;
            this.players[i].y = player.y;
            this.players[i].down = player.down;
            this.players[i].left = player.left;
            this.players[i].up = player.up;
            this.players[i].right = player.right;
            this.players[i].attack = player.attack;
          }
        }
      }
    });
    this.camera.update();
  }

  update(delta) {
    this.player.update(
      delta,
      {
        down: this.keyboard.isDown(this.keyboard.down),
        left: this.keyboard.isDown(this.keyboard.left),
        up: this.keyboard.isDown(this.keyboard.up),
        right: this.keyboard.isDown(this.keyboard.right),
        attack: this.keyboard.isDown(this.keyboard.spacebar)
      }
    );
    this.players.forEach(player => {
      player.update(
        delta,
        {
          down: player.down,
          left: player.left,
          up: player.up,
          right: player.right,
          attack: player.attack
        }
      );
    });
    //this.treeMonster.update(delta, this.player);
    //this.camera.update();
    this.connection.send(JSON.stringify({
      down: this.keyboard.isDown(this.keyboard.down),
      left: this.keyboard.isDown(this.keyboard.left),
      up: this.keyboard.isDown(this.keyboard.up),
      right: this.keyboard.isDown(this.keyboard.right),
      attack: this.keyboard.isDown(this.keyboard.spacebar),
      delta: delta
    }));
  }

  render() {
    // draw map background layer
    this._drawLayer(0);
    this._drawLayer(1);

    this.players.forEach(player => {
      this.ctx.drawImage(
        this.tileAtlas,
        player.animationState.animationFrames[player.animationState.currentAnimationFrame].x,
        player.animationState.animationFrames[player.animationState.currentAnimationFrame].y,
        player.animationState.animationFrames[player.animationState.currentAnimationFrame].w,
        player.animationState.animationFrames[player.animationState.currentAnimationFrame].h,
        player.x - this.camera.x - player.width/2,
        player.y - this.camera.y - player.height/2,
        player.animationState.animationFrames[player.animationState.currentAnimationFrame].w,
        player.animationState.animationFrames[player.animationState.currentAnimationFrame].h
      );
    });


    this.ctx.drawImage(
      this.tileAtlas,
      this.player.animationState.animationFrames[this.player.animationState.currentAnimationFrame].x,
      this.player.animationState.animationFrames[this.player.animationState.currentAnimationFrame].y,
      this.player.animationState.animationFrames[this.player.animationState.currentAnimationFrame].w,
      this.player.animationState.animationFrames[this.player.animationState.currentAnimationFrame].h,
      this.player.screenX - this.player.width / 2,
      this.player.screenY - this.player.height / 2,
      this.player.animationState.animationFrames[this.player.animationState.currentAnimationFrame].w,
      this.player.animationState.animationFrames[this.player.animationState.currentAnimationFrame].h
    );

    /*for (let i = 0; i < this.players.length; i++) {
      this.ctx.drawImage(
        this.tileAtlas,
        this.treeMonster.animationState.animationFrames[this.treeMonster.animationState.currentAnimationFrame].x,
        this.treeMonster.animationState.animationFrames[this.treeMonster.animationState.currentAnimationFrame].y,
        this.treeMonster.animationState.animationFrames[this.treeMonster.animationState.currentAnimationFrame].w,
        this.treeMonster.animationState.animationFrames[this.treeMonster.animationState.currentAnimationFrame].h,
        this.treeMonster.x - this.camera.x,
        this.treeMonster.y - this.camera.y,
        this.treeMonster.animationState.animationFrames[this.treeMonster.animationState.currentAnimationFrame].w,
        this.treeMonster.animationState.animationFrames[this.treeMonster.animationState.currentAnimationFrame].h
      );
      Things[i]
    }*/

    /*this.ctx.drawImage(
      this.tileAtlas,
      this.treeMonster.animationState.animationFrames[this.treeMonster.animationState.currentAnimationFrame].x,
      this.treeMonster.animationState.animationFrames[this.treeMonster.animationState.currentAnimationFrame].y,
      this.treeMonster.animationState.animationFrames[this.treeMonster.animationState.currentAnimationFrame].w,
      this.treeMonster.animationState.animationFrames[this.treeMonster.animationState.currentAnimationFrame].h,
      this.treeMonster.x - this.camera.x,
      this.treeMonster.y - this.camera.y,
      this.treeMonster.animationState.animationFrames[this.treeMonster.animationState.currentAnimationFrame].w,
      this.treeMonster.animationState.animationFrames[this.treeMonster.animationState.currentAnimationFrame].h
    );*/

    // draw map top layer
    this._drawLayer(2);
    //this._drawGrid();
  }

  _drawLayer(layer) {

    let startCol = Math.floor(this.camera.x / this.map.tsize);
    let endCol = startCol + (this.camera.width / this.map.tsize);
    let startRow = Math.floor(this.camera.y / this.map.tsize);
    let endRow = startRow + (this.camera.height / this.map.tsize);
    let offsetX = -this.camera.x + startCol * this.map.tsize;
    let offsetY = -this.camera.y + startRow * this.map.tsize;

    for (let c = startCol; c <= endCol; c++) {
      for (let r = startRow; r <= endRow; r++) {

        let tile = this.map.getTile(layer, c, r);
        let x = (c - startCol) * this.map.tsize + offsetX;
        let y = (r - startRow) * this.map.tsize + offsetY;

        if (tile !== 0) { // 0 => empty tile
          this.ctx.drawImage(
            this.tileAtlas, // image
            this.map.sprites[tile].x, // source x
            this.map.sprites[tile].y, // source y
            this.map.sprites[tile].w, // source width
            this.map.sprites[tile].h, // source height
            Math.round(x),  // target x
            Math.round(y), // target y
            this.map.sprites[tile].w, // target width
            this.map.sprites[tile].h // target height
          );
        }
      }
    }
  }

  _drawGrid() {
    let width = this.map.cols * this.map.tsize;
    let height = this.map.rows * this.map.tsize;
    let x, y;
    for (let r = 0; r < this.map.rows; r++) {
      x = - this.camera.x;
      y = r * this.map.tsize - this.camera.y;
      this.ctx.beginPath();
      this.ctx.moveTo(x, y);
      this.ctx.lineTo(width, y);
      this.ctx.stroke();
    }
    for (let c = 0; c < this.map.cols; c++) {
      x = c * this.map.tsize - this.camera.x;
      y = - this.camera.y;
      this.ctx.beginPath();
      this.ctx.moveTo(x, y);
      this.ctx.lineTo(x, height);
      this.ctx.stroke();
    }
  }

}

window.onload = () => {
  window.Game = new Game();
};