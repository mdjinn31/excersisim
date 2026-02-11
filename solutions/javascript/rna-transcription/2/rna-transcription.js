//
// This is only a SKELETON file for the 'RNA Transcription' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

const RNA = {'G': 'C', 'C': 'G', 'T': 'A', 'A': 'U'}

export const toRna = (dna) => dna.split('').map(d=>RNA[d]).join('')