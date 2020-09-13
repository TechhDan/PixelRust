export default class Map {

  constructor(cols, rows, tileSize) {
    this.cols = cols;
    this.rows = rows;
    this.tsize = tileSize;
    this.waterAnimateCount = 0;
  }

  setSprites(sprites) {
    this.sprites = sprites;
  }

  setLayers(background, backgroundDecoration, foreground) {
    this.layers = [
      background,
      backgroundDecoration,
      foreground
    ];
  }

  getTile(layer, col, row) {
    return this.layers[layer][row * this.cols + col];
  }

  isSolidTileAtXY(x, y) {
    let col = Math.floor(x / this.tsize);
    let row = Math.floor(y / this.tsize);

    // tiles 3 and 5 are solid -- the rest are walkable
    // loop through all layers and return TRUE if any tile is solid
    return this.layers.reduce((res, layer, index) => {
      let tile = this.getTile(index, col, row);
      let isSolid = false;
      if (tile > 0 &&
          (this.sprites[tile].name == 'Background/water' ||
          this.sprites[tile].name == 'Background/deepWater' ||
          this.sprites[tile].name == 'Background/deepWater2')) {
        isSolid = true;
      }
      return res || isSolid;
    }, false);
  }

  getCol(x) {
    return Math.floor(x / this.tsize);
  }

  getRow(y) {
    return Math.floor(y / this.tsize);
  }

  getX(col) {
    return col * this.tsize;
  }

  getY(row) {
    return row * this.tsize;
  }

  getMapWidth() {
    return this.cols * this.tsize;
  }

  getMapHeight() {
    return this.rows * this.tsize;
  }

  animateWater(delta) {
    this.waterAnimateCount += 1 * delta;
    if (this.waterAnimateCount > 1) {
      for (let i = 0; i < this.layers[0].length; i++) {
        if (
          this.sprites[this.layers[0][i]].name == 'Background/water' ||
          this.sprites[this.layers[0][i]].name == 'Background/deepWater' ||
          this.sprites[this.layers[0][i]].name == 'Background/deepWater2'
        ) {
          switch(Math.floor((Math.random() * 3) + 0)) {
            case 0:
              this.layers[0][i] = this.getSpriteIndexByName('Background/water');
              break;
            case 1:
              this.layers[0][i] = this.getSpriteIndexByName('Background/deepWater');
              break;
            case 2:
              this.layers[0][i] = this.getSpriteIndexByName('Background/deepWater2');
              break;
          }
        }
      }
      this.waterAnimateCount = 0;
    }
  }

  getSpriteIndexByName(name) {
    for (let i = 1; i < this.sprites.length; i++) {
      if (this.sprites[i].name == name) {
        return i;
      }
    }
    return 0;
  }
}
