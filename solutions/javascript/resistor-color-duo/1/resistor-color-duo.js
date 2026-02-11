//
// This is only a SKELETON file for the 'Resistor Color Duo' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

export const decodedValue = (...colors) => {
    let value =''
    for (let i = 0; i < 2; i++) {
        value += COLORS_CODES.indexOf(colors[0][i])
    }
  return Number(value)
};

export const COLORS_CODES = ['black','brown','red','orange','yellow','green','blue','violet','grey','white']