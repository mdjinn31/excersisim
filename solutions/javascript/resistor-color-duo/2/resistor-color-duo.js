//
// This is only a SKELETON file for the 'Resistor Color Duo' exercise. It's been provided as a
// convenience to get you started writing code faster.
//
export const COLORS_CODES = ['black','brown','red','orange','yellow','green','blue','violet','grey','white']

export const decodedValue = (...colors) => Number([0,1].map(i=>COLORS_CODES.indexOf(colors[0][i])).join(''))