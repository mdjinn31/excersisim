//
// This is only a SKELETON file for the 'Matrix' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

export class Matrix {
  constructor(matrix) {
      this.matrix = matrix
  }

  get rows() {
      return this.matrix.split("\n").map((row) => row.split(" ").map((number) => Number(number)))
  }

  get columns() {
      const cols = []
      for (let i = 0; i <= this.rows.length; i++) cols[i] = this.rows.map((row) => row[i])
      return cols
  }
}
