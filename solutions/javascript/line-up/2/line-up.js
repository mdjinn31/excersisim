//
// This is only a SKELETON file for the 'Line Up' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

const suffix = (n) => n.at(-2) !== '1' && (["", "st", "nd", "rd"])[n.at(-1)] || "th";

export const format = ( name = "",  place = 0) => 
 `${name}, you are the ${place}${suffix(String(place))} customer we serve today. Thank you!`
