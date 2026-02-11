// @ts-check
//
// The line above enables type checking for this file. Various IDEs interpret
// the @ts-check directive. It will give you helpful autocompletion when
// implementing this exercise.

/**
 * Determines how long it takes to prepare a certain juice.
 *
 * @param {string} name
 * @returns {number} time in minutes
 */
export function timeToMixJuice(name) {
  switch(name){
    case 'Pure Strawberry Joy':
        return 0.5
      break
    case 'Energizer':
        return 1.5
      break
    case 'Green Garden':
        return 1.5
      break
    case 'Tropical Island':
        return 3
      break
    case 'All or Nothing':
        return 5
      break
    default:
        return 2.5
  }
}

/**
 * Calculates the number of limes that need to be cut
 * to reach a certain supply.
 *
 * @param {number} wedgesNeeded
 * @param {string[]} limes
 * @returns {number} number of limes cut
 */
export function limesToCut(wedgesNeeded, limes) {
  let cuts = 0
  const limeList = limes.length
  
  if(wedgesNeeded == 0) return 0
  
  do {
      const lime = limes.shift()
      switch(lime){
        case 'small':
              cuts += 6
          break
        case 'medium':
              cuts += 8
          break
        case 'large':
              cuts += 10
          break
      }
  } while ((limes.length>0) && (wedgesNeeded >= cuts))
  
  return limeList-limes.length
}

/**
 * Determines which juices still need to be prepared after the end of the shift.
 *
 * @param {number} timeLeft
 * @param {string[]} orders
 * @returns {string[]} remaining orders after the time is up
 */
export function remainingOrders(timeLeft, orders) {
  let time = 0
  do {
      const drink = orders.shift()
      time += timeToMixJuice(drink)
  } while (timeLeft > time)
  return orders
}
