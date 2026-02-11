//
// This is only a SKELETON file for the 'Leap' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

export const isLeap = (year) => ((0 == year % 4) && (0 != year % 100) || (0 == year % 400)) ? true : false
