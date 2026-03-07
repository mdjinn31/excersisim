//
// This is only a SKELETON file for the 'Line Up' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

const ordinal = (order) => {
    
    let hunders = order % 100;
    if(hunders >= 11 && hunders <= 13){
        return `${order}th`;
    }

    switch (order % 10){
      case 1:
          return `${order}st`;
      case 2:
          return `${order}nd`;
      case 3:
          return `${order}rd`;
      default:
          return `${order}th`;
    }

}

export const format = ( name = "",  place = 0) => {

  const order = ordinal(place);
  return `${name}, you are the ${order} customer we serve today. Thank you!`
};
