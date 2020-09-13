class PlayerAnimation {
  constructor() {
    this.animationFrameCount = 0;
    this.animationFrameCountThreshold = .1;
    this.currentAnimationFrame = 0;
  }
}

class SouthIdle extends PlayerAnimation {
  start(player) {
    this.state = 'southIdle';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/South/Idle")]
    ];
    player.footStepSound.stop();
    player.punchSound.stop();
  }

  update(player, input) {
    if (input.attack) {
      player.changeState(new SouthAttack());
    } else if (input.down && input.left) {
      player.changeState(new SouthWestRun());
    } else if (input.down && input.right) {
      player.changeState(new SouthEastRun());
    } else if (input.up && input.left) {
      player.changeState(new NorthWestRun());
    } else if (input.up && input.right) {
      player.changeState(new NorthEastRun());
    } else if (input.down) {
      player.changeState(new SouthRun());
    } else if (input.left) {
      player.changeState(new WestRun());
    } else if (input.up) {
      player.changeState(new NorthRun());
    } else if (input.right) {
      player.changeState(new EastRun());
    }
  }
}

class SouthWestIdle extends PlayerAnimation {
  start(player) {
    this.state = 'southWestIdle';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/SouthWest/Idle")]
    ];
    player.footStepSound.stop();
    player.punchSound.stop();
  }

  update(player, input) {
    if (input.attack) {
      player.changeState(new WestAttack());
    } else if (input.down && input.left) {
      player.changeState(new SouthWestRun());
    } else if (input.down && input.right) {
      player.changeState(new SouthEastRun());
    } else if (input.up && input.left) {
      player.changeState(new NorthWestRun());
    } else if (input.up && input.right) {
      player.changeState(new NorthEastRun());
    } else if (input.down) {
      player.changeState(new SouthRun());
    } else if (input.left) {
      player.changeState(new WestRun());
    } else if (input.up) {
      player.changeState(new NorthRun());
    } else if (input.right) {
      player.changeState(new EastRun());
    }
  }
}

class WestIdle extends PlayerAnimation {
  start(player) {
    this.state = 'westIdle';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/West/Idle")]
    ];
    player.footStepSound.stop();
    player.punchSound.stop();
  }

  update(player, input) {
    if (input.attack) {
      player.changeState(new WestAttack());
    } else if (input.down && input.left) {
      player.changeState(new SouthWestRun());
    } else if (input.down && input.right) {
      player.changeState(new SouthEastRun());
    } else if (input.up && input.left) {
      player.changeState(new NorthWestRun());
    } else if (input.up && input.right) {
      player.changeState(new NorthEastRun());
    } else if (input.down) {
      player.changeState(new SouthRun());
    } else if (input.left) {
      player.changeState(new WestRun());
    } else if (input.up) {
      player.changeState(new NorthRun());
    } else if (input.right) {
      player.changeState(new EastRun());
    }
  }
}

class NorthWestIdle extends PlayerAnimation {
  start(player) {
    this.state = 'northWestIdle';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/NorthWest/Idle")]
    ];
    player.footStepSound.stop();
    player.punchSound.stop();
  }

  update(player, input) {
    if (input.attack) {
      player.changeState(new NorthAttack());
    } else if (input.down && input.left) {
      player.changeState(new SouthWestRun());
    } else if (input.down && input.right) {
      player.changeState(new SouthEastRun());
    } else if (input.up && input.left) {
      player.changeState(new NorthWestRun());
    } else if (input.up && input.right) {
      player.changeState(new NorthEastRun());
    } else if (input.down) {
      player.changeState(new SouthRun());
    } else if (input.left) {
      player.changeState(new WestRun());
    } else if (input.up) {
      player.changeState(new NorthRun());
    } else if (input.right) {
      player.changeState(new EastRun());
    }
  }
}

class NorthIdle extends PlayerAnimation {
  start(player) {
    this.state = 'northIdle';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/North/Idle")]
    ];
    player.footStepSound.stop();
    player.punchSound.stop();
  }

  update(player, input) {
    if (input.attack) {
      player.changeState(new NorthAttack());
    } else if (input.down && input.left) {
      player.changeState(new SouthWestRun());
    } else if (input.down && input.right) {
      player.changeState(new SouthEastRun());
    } else if (input.up && input.left) {
      player.changeState(new NorthWestRun());
    } else if (input.up && input.right) {
      player.changeState(new NorthEastRun());
    } else if (input.down) {
      player.changeState(new SouthRun());
    } else if (input.left) {
      player.changeState(new WestRun());
    } else if (input.up) {
      player.changeState(new NorthRun());
    } else if (input.right) {
      player.changeState(new EastRun());
    }
  }
}

class NorthEastIdle extends PlayerAnimation {
  start(player) {
    this.state = 'northEastIdle';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/NorthEast/Idle")]
    ];
    player.footStepSound.stop();
    player.punchSound.stop();
  }

  update(player, input) {
    if (input.attack) {
      player.changeState(new EastAttack());
    } else if (input.down && input.left) {
      player.changeState(new SouthWestRun());
    } else if (input.down && input.right) {
      player.changeState(new SouthEastRun());
    } else if (input.up && input.left) {
      player.changeState(new NorthWestRun());
    } else if (input.up && input.right) {
      player.changeState(new NorthEastRun());
    } else if (input.down) {
      player.changeState(new SouthRun());
    } else if (input.left) {
      player.changeState(new WestRun());
    } else if (input.up) {
      player.changeState(new NorthRun());
    } else if (input.right) {
      player.changeState(new EastRun());
    }
  }
}

class EastIdle extends PlayerAnimation {
  start(player) {
    this.state = 'eastIdle';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/East/Idle")]
    ];
    player.footStepSound.stop();
    player.punchSound.stop();
  }

  update(player, input) {
    if (input.attack) {
      player.changeState(new EastAttack());
    } else if (input.down && input.left) {
      player.changeState(new SouthWestRun());
    } else if (input.down && input.right) {
      player.changeState(new SouthEastRun());
    } else if (input.up && input.left) {
      player.changeState(new NorthWestRun());
    } else if (input.up && input.right) {
      player.changeState(new NorthEastRun());
    } else if (input.down) {
      player.changeState(new SouthRun());
    } else if (input.left) {
      player.changeState(new WestRun());
    } else if (input.up) {
      player.changeState(new NorthRun());
    } else if (input.right) {
      player.changeState(new EastRun());
    }
  }
}

class SouthEastIdle extends PlayerAnimation {
  start(player) {
    this.state = 'southEastIdle';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/SouthEast/Idle")]
    ];
    player.footStepSound.stop();
    player.punchSound.stop();
  }

  update(player, input) {
    if (input.down && input.left) {
      player.changeState(new SouthWestRun());
    } else if (input.down && input.right) {
      player.changeState(new SouthEastRun());
    } else if (input.up && input.left) {
      player.changeState(new NorthWestRun());
    } else if (input.up && input.right) {
      player.changeState(new NorthEastRun());
    } else if (input.down) {
      player.changeState(new SouthRun());
    } else if (input.left) {
      player.changeState(new WestRun());
    } else if (input.up) {
      player.changeState(new NorthRun());
    } else if (input.right) {
      player.changeState(new EastRun());
    }
  }
}

class SouthRun extends PlayerAnimation {

  start(player) {
    this.state = 'southRun';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/South/Run/Frame1")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/South/Run/Frame2")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/South/Run/Frame3")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/South/Run/Frame4")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/South/Run/Frame5")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/South/Run/Frame6")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/South/Run/Frame7")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/South/Run/Frame8")]
    ];
    player.footStepSound.play();
  }

  update(player, input) {
    if (input.attack) {
      player.changeState(new SouthAttack());
    } else if (input.down && input.left) {
      player.changeState(new SouthWestRun());
    } else if (input.down && input.right) {
      player.changeState(new SouthEastRun());
    } else if (!input.down) {
      player.changeState(new SouthIdle());
    } 
  }
}

class SouthWestRun extends PlayerAnimation {
  start(player) {
    this.state = 'southWestRun';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/SouthWest/Run/Frame1")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/SouthWest/Run/Frame2")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/SouthWest/Run/Frame3")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/SouthWest/Run/Frame4")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/SouthWest/Run/Frame5")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/SouthWest/Run/Frame6")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/SouthWest/Run/Frame7")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/SouthWest/Run/Frame8")]
    ];
    player.footStepSound.play();
  }

  update(player, input) {
    if (input.attack) {
      player.changeState(new SouthRun());
    } else if (input.left && !input.down) {
      player.changeState(new WestRun());
    } else if (input.down && !input.left) {
      player.changeState(new SouthRun());
    } else if (!input.left && !input.down) {
      player.changeState(new SouthWestIdle());
    }
  }
}

class WestRun extends PlayerAnimation {
  start(player) {
    this.state = 'westRun';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/West/Run/Frame1")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/West/Run/Frame2")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/West/Run/Frame3")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/West/Run/Frame4")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/West/Run/Frame5")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/West/Run/Frame6")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/West/Run/Frame7")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/West/Run/Frame8")]
    ];
    player.footStepSound.play();
  }

  update(player, input) {
    if (input.attack) {
      player.changeState(new WestAttack());
    } else if (input.left && input.down) {
      player.changeState(new SouthWestRun());
    } else if (input.left && input.up) {
      player.changeState(new NorthWestRun());
    } else if (!input.left) {
      player.changeState(new WestIdle());
    }
  }
}

class NorthWestRun extends PlayerAnimation {
  start(player) {
    this.state = 'northWestRun';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/NorthWest/Run/Frame1")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/NorthWest/Run/Frame2")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/NorthWest/Run/Frame3")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/NorthWest/Run/Frame4")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/NorthWest/Run/Frame5")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/NorthWest/Run/Frame6")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/NorthWest/Run/Frame7")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/NorthWest/Run/Frame8")]
    ];
    player.footStepSound.play();
  }

  update(player, input) {
    if (input.attack) {
      player.changeState(new NorthRun());
    } else if (input.left && !input.up) {
      player.changeState(new WestRun());
    } else if (input.up && !input.left) {
      player.changeState(new NorthRun());
    } else if (!input.left && !input.up) {
      player.changeState(new NorthWestIdle());
    } 
  }
}

class NorthRun extends PlayerAnimation {
  start(player) {
    this.state = 'northRun';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/North/Run/Frame1")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/North/Run/Frame2")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/North/Run/Frame3")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/North/Run/Frame4")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/North/Run/Frame5")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/North/Run/Frame6")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/North/Run/Frame7")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/North/Run/Frame8")]
    ];
    player.footStepSound.play();
  }

  update(player, input) {
    if (input.attack) {
      player.changeState(new NorthAttack());
    } else if (input.up && input.left) {
      player.changeState(new NorthWestRun());
    } else if (input.up && input.right) {
      player.changeState(new NorthEastRun());
    } else if (!input.up) {
      player.changeState(new NorthIdle());
    }
  }
}

class NorthEastRun extends PlayerAnimation {
  start(player) {
    this.state = 'northEastRun';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/NorthEast/Run/Frame1")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/NorthEast/Run/Frame2")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/NorthEast/Run/Frame3")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/NorthEast/Run/Frame4")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/NorthEast/Run/Frame5")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/NorthEast/Run/Frame6")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/NorthEast/Run/Frame7")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/NorthEast/Run/Frame8")]
    ];
    player.footStepSound.play();
  }

  update(player, input) {
    if (input.attack) {
      player.changeState(new NorthAttack());
    } else if (input.up && !input.right) {
      player.changeState(new NorthRun());
    } else if (input.right && !input.up) {
      player.changeState(new EastRun());
    } else if (!input.up && !input.right) {
      player.changeState(new NorthEastIdle());
    }
  }
}

class EastRun extends PlayerAnimation {
  start(player) {
    this.state = 'eastRun';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/East/Run/Frame1")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/East/Run/Frame2")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/East/Run/Frame3")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/East/Run/Frame4")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/East/Run/Frame5")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/East/Run/Frame6")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/East/Run/Frame7")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/East/Run/Frame8")]
    ];
    player.footStepSound.play();
  }

  update(player, input) {
    if (input.attack) {
      player.changeState(new EastAttack());
    } else if (input.right && input.down) {
      player.changeState(new SouthEastRun());
    } else if (input.right && input.up) {
      player.changeState(new NorthEastRun());
    } else if (!input.right) {
      player.changeState(new EastIdle());
    }
  }
}

class SouthEastRun extends PlayerAnimation {
  start(player) {
    this.state = 'southEastRun';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/SouthEast/Run/Frame1")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/SouthEast/Run/Frame2")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/SouthEast/Run/Frame3")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/SouthEast/Run/Frame4")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/SouthEast/Run/Frame5")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/SouthEast/Run/Frame6")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/SouthEast/Run/Frame7")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/SouthEast/Run/Frame8")]
    ];
    player.footStepSound.play();
  }

  update(player, input) {
    if (input.attack) {
      player.changeState(new SouthAttack());
    } else if (input.right && !input.down) {
      player.changeState(new EastRun());
    } else if (input.down && !input.right) {
      player.changeState(new SouthRun());
    } if (!input.down && !input.right) {
      player.changeState(new SouthEastIdle());
    }
  }
}

class SouthAttack extends PlayerAnimation {

  start(player) {
    this.state = 'southAttack';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/South/Attack/Frame1")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/South/Attack/Frame2")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/South/Attack/Frame3")]
    ];
    this.lastAnimationFrame = null;
    this.cycles = 0;
    player.punchSound.sound.currentTime = 0;
    player.punchSound.play();
    player.footStepSound.stop();
  }

  update(player, input) {
    if (this.lastAnimationFrame != this.currentAnimationFrame) {
      this.lastAnimationFrame = this.currentAnimationFrame;
      this.cycles++;
    }
    if (!input.attack && this.cycles > this.animationFrames.length) {
      player.changeState(new SouthIdle());
    }
  }
}

class WestAttack extends PlayerAnimation {
  start(player) {
    this.state = 'westAttack';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/West/Attack/Frame1")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/West/Attack/Frame2")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/West/Attack/Frame3")]
    ];
    this.lastAnimationFrame = null;
    this.cycles = 0;
    player.punchSound.sound.currentTime = 0;
    player.punchSound.play();
    player.footStepSound.stop();
  }

  update(player, input) {
    if (this.lastAnimationFrame != this.currentAnimationFrame) {
      this.lastAnimationFrame = this.currentAnimationFrame;
      this.cycles++;
    }
    if (!input.attack && this.cycles > this.animationFrames.length) {
      player.changeState(new WestIdle());
    }
  }
}

class NorthAttack extends PlayerAnimation {
  start(player) {
    this.state = 'northAttack';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/North/Attack/Frame1")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/North/Attack/Frame2")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/North/Attack/Frame3")]
    ];
    this.lastAnimationFrame = null;
    this.cycles = 0;
    player.punchSound.sound.currentTime = 0;
    player.punchSound.play();
    player.footStepSound.stop();
  }

  update(player, input) {
    if (this.lastAnimationFrame != this.currentAnimationFrame) {
      this.lastAnimationFrame = this.currentAnimationFrame;
      this.cycles++;
    }
    if (!input.attack && this.cycles > this.animationFrames.length) {
      player.changeState(new NorthIdle());
    }
  }
}

class EastAttack extends PlayerAnimation {
  start(player) {
    this.state = 'eastAttack';
    this.animationFrames = [
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/East/Attack/Frame1")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/East/Attack/Frame2")],
      player.map.sprites[player.map.getSpriteIndexByName("Human/Male/East/Attack/Frame3")]
    ];
    this.lastAnimationFrame = null;
    this.cycles = 0;
    player.punchSound.sound.currentTime = 0;
    player.punchSound.play();
    player.footStepSound.stop();
  }

  update(player, input) {
    if (this.lastAnimationFrame != this.currentAnimationFrame) {
      this.lastAnimationFrame = this.currentAnimationFrame;
      this.cycles++;
    }
    if (!input.attack && this.cycles > this.animationFrames.length) {
      player.changeState(new EastIdle());
    }
  }
}

export {
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
};
