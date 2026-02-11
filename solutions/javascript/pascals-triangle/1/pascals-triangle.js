//
// This is only a SKELETON file for the 'Pascals Triangle' exercise. It's been provided as a
// convenience to get you started writing code faster.
//
const fact     = (n)    => n <= 1 ? 1 : n * fact (n - 1), 
      binomial = (n, k) => fact (n) / (fact (k) * fact (n - k))

export const rows = (size) => Array.from( {length: size}, 
                    (_, i) => Array.from( {length: i + 1}, 
                    (_, j) => binomial(i, j)))