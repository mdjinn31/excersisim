//
// This is only a SKELETON file for the 'Pangram' exercise. It's been provided as a
// convenience to get you started writing code faster.
//
export const alphabet = 'abcdefghijklmnopqrstuvwxyz'

export const isPangram = (sentence) =>  
    ([...new Set(sentence.toLowerCase().replace(/[^a-zA-Z]/g, "").split(''))].length === 26) ? true : false

