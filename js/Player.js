import {
  SouthIdle,
  SouthWestIdle,
  WestIdle,
  NorthWestIdle,
  NorthIdle,
  NorthEastIdle,
  EastIdle,
  SouthEastIdle,
  SouthRun,
  SouthWestRun,
  WestRun,
  NorthWestRun,
  NorthRun,
  NorthEastRun,
  EastRun,
  SouthEastRun,
  SouthAttack,
  WestAttack,
  NorthAttack,
  EastAttack
} from './PlayerAnimations.js';
import Sound from './Sound.js';

export default class Player {

  constructor(map, x, y, id) {
    this.id = id;
    this.map = map;
    this.x = x;
    this.y = y;
    this.down = false;
    this.left = false;
    this.up = false;
    this.right = false;
    this.attack = false;
    this.speed = 80;
    this.footStepSound = new Sound('./assets/audio/barefoot-step.mp3');
    this.punchSound = new Sound('./assets/audio/punch.mp3');
    this.punchSound.sound.volume = .1;
    this.animationState = new SouthIdle();
    this.animationState.start(this);
  }

  get width() {
    return this.animationState.animationFrames[this.animationState.currentAnimationFrame].w;
  }

  get height() {
    return this.animationState.animationFrames[this.animationState.currentAnimationFrame].h;
  }

  changeState(animationState) {
    this.animationState = animationState;
    this.animationState.start(this);
  }

  update(delta, input) {
    this.animationState.update(this, input);
    this.updateAnimation(delta);
  }

  updateOriginal(delta, input) {
    let dirx = 0,
      diry = 0;

    if (input.left) { dirx = -1; }
    if (input.right) { dirx = 1; }
    if (input.up) { diry = -1; }
    if (input.down) { diry = 1; }

    this.animationState.update(this, input);

    if (!input.attack) {
      this.x += dirx * this.speed * delta;
      this.y += diry * this.speed * delta;
    }

    this.updateAnimation(delta);

    // check if we walked into a non-walkable tile
    //this._collide(dirx, diry, delta);

    // clamp values
    let maxX = this.map.cols * this.map.tsize;
    let maxY = this.map.rows * this.map.tsize;
    this.x = Math.max(0, Math.min(this.x, maxX));
    this.y = Math.max(0, Math.min(this.y, maxY));

  }

  updateAnimation(deltaTime) {
    this.animationState.animationFrameCount += 1 * deltaTime;
    if (this.animationState.animationFrameCount < this.animationState.animationFrameCountThreshold) {
      return;
    }
    this.animationState.animationFrameCount = 0;
    this.animationState.currentAnimationFrame++;
    if (this.animationState.currentAnimationFrame >= this.animationState.animationFrames.length) {
      this.animationState.currentAnimationFrame = 0;
    }
  }

  _collide (dirx, diry, delta) {
    let row, col;
    let left = this.x - this.width / 2;
    let right = this.x + this.width / 2;
    let top = this.y - this.height / 2;
    let bottom = this.y + this.height / 2;
    // check for collisions on sprite sides
    let collision = 
      this.map.isSolidTileAtXY(left, top) ||
      this.map.isSolidTileAtXY(right, top) ||
      this.map.isSolidTileAtXY(right, bottom) ||
      this.map.isSolidTileAtXY(left, bottom);
    if (!collision) {
      return;
    }
    if (diry !== 0) {
      this.y -= diry * this.speed * delta;
    }
    if (dirx !== 0) {
      this.x -= dirx * this.speed * delta;
    }
  }

}