import {
  West,
  East
} from './TreeMonsterAnimations.js';

export default class TreeMonster {

  constructor(map, x, y) {
    this.map = map;
    this.x = x;
    this.y = y;
    this.speed = 60;
    this.animationState = new West();
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

  update(delta, hero) {

    let dirx = 0,
      diry = 0;

    dirx = this.x < hero.x ? 1 : -1;
    diry = this.y < hero.y ? 1 : -1;

    if (parseInt(this.x) !== parseInt(hero.x)) {
      this.x += dirx * this.speed * delta;
    }

    this.y += diry * this.speed * delta;

    if (hero.attack) {
      this.x += Math.floor((500 * delta));
    }

    this.animationState.update(this, dirx);
    this.updateAnimation(delta);
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

}