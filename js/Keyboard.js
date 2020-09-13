export default class Keyboard {

  constructor() {
    this.left = 37;
    this.right = 39;
    this.up = 38;
    this.down = 40;
    this.spacebar = 32;
    this._keys = {};
  }

  listenForEvents(keys) {
    window.addEventListener('keydown', (e) => this._onKeyDown(e));
    window.addEventListener('keyup', (e) => this._onKeyUp(e));

    keys.forEach(key => {
      this._keys[key] = false;
    });
  }

  _onKeyDown(event) {
    let keyCode = event.keyCode;
    if (keyCode in this._keys) {
      event.preventDefault();
      this._keys[keyCode] = true;
    }
  }

  _onKeyUp(event) {
    let keyCode = event.keyCode;
    if (keyCode in this._keys) {
      event.preventDefault();
      this._keys[keyCode] = false;
    }
  };

  isDown(keyCode) {
    if (!keyCode in this._keys) {
      throw new Error('Keycode ' + keyCode + ' is not being listened to');
    }
    return this._keys[keyCode];
  }

}