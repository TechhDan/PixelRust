class TreeMonsterAnimation {
  constructor() {
    this.animationFrameCount = 0;
    this.animationFrameCountThreshold = .1;
    this.currentAnimationFrame = 0;
  }
}

class East extends TreeMonsterAnimation {
  start(player) {
    this.state = 'east';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Monsters/WalkingTree/East/Frame1")],
      player.map.sprites[player.map.getSpriteIndexByName("Monsters/WalkingTree/East/Frame2")],
      player.map.sprites[player.map.getSpriteIndexByName("Monsters/WalkingTree/East/Frame3")],
      player.map.sprites[player.map.getSpriteIndexByName("Monsters/WalkingTree/East/Frame4")]
    ];
  }

  update(player, dirx) {
    if (dirx == -1) {
      player.changeState(new West());
    }
  }
}

class West extends TreeMonsterAnimation {
  start(player) {
    this.state = 'west';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Monsters/WalkingTree/West/Frame1")],
      player.map.sprites[player.map.getSpriteIndexByName("Monsters/WalkingTree/West/Frame2")],
      player.map.sprites[player.map.getSpriteIndexByName("Monsters/WalkingTree/West/Frame3")],
      player.map.sprites[player.map.getSpriteIndexByName("Monsters/WalkingTree/West/Frame4")]
    ];
  }

  update(player, dirx) {
    if (dirx == 1) {
      player.changeState(new East());
    }
  }
}

export {
  West,
  East
};
