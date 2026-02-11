//
// This is only a SKELETON file for the 'Linked List' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

export class LinkedList {
  constructor() {
    this.node = undefined
  }
  newNode = (value) => {
    return {
      prev: undefined,
      next: undefined,
      value: value
    }
  }
  push(value) {
    const newNode = this.newNode(value)
    if (this.node) {
      this.toEnd()
      this.node.next = newNode
      newNode.prev = this.node
    } else {
      this.node = newNode
    }
  }
  pop() {
    this.toEnd()
    const value = this.node.value
    this.node = this.node.prev
    if (this.node) this.node.next = undefined
    return value
  }
  unshift(value) {
    const newNode = this.newNode(value)
    if (this.node) {
      this.toHead()
      this.node.prev = newNode
      newNode.next = this.node
    } else {
      this.node = newNode
    }
  }
  shift() {
    this.toHead()
    const value = this.node.value
    this.node = this.node.next
    if (this.node) this.node.prev = undefined
    return value
  }
  toEnd() {
    let i = 1
    while (this.node?.next) {
      i++
      this.node = this.node.next
    }
    return i
  }
  toHead() {
    while (this.node?.prev) {
      this.node = this.node.prev
    }
  }
  count() {
    if (!this.node) return 0
    this.toHead()
    return this.toEnd()
  }
  find(x) {
    this.toHead()
    while (this.node?.next && this.node?.value !== x) {
      this.node = this.node.next
    }
    return this.node?.value === x
  }
  delete(x) {
    if (this.find(x)) {
      const prev = this.node.prev
      const next = this.node.next
      if (prev) prev.next = next
      if (next) next.prev = prev
      this.node = prev || next
    }
    
  }
}
