
Size.prototype.resize = function resize(newWidth, newHeight) {
    this.width = newWidth
    this.height = newHeight
}

Position.prototype.move = function move(newX, newY) {
    this.x = newX
    this.y = newY
}

export function Size(width = 80, height = 60) {
    this.width = width
    this.height = height
}

export function Position(x = 0, y = 0) {
    this.x = x
    this.y = y
}


export class ProgramWindow {
    constructor() {
      this.screenSize = new Size(800, 600)
      this.size = new Size();
      this.position = new Position();
    }
  
    resize(newSize) {
      this.size.resize(
          Math.max(1, Math.min(newSize.width,  this.screenSize.width  - this.position.x)), 
          Math.max(1, Math.min(newSize.height, this.screenSize.height - this.position.y))
      )
    }
  
    move(newPosition) {
      this.position.move(
          Math.max(0, Math.min(newPosition.x, this.screenSize.width  - this.size.width)), 
          Math.max(0, Math.min(newPosition.y, this.screenSize.height - this.size.height))
      )
    }
}

export function changeWindow(programWindow) {
    programWindow.move(new Position())
    programWindow.resize(new Size(400, 300))
    programWindow.move(new Position(100, 150))
    return programWindow
}
