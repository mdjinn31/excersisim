// @ts-check

export const generateRandom = (min, max) => (min + Math.random()*(max - min))
/**
 * Generates a random starship registry number.
 *
 * @returns {string} the generated registry number.
 */
export function randomShipRegistryNumber() {
  return `NCC-${Math.floor(generateRandom(1000,9999))}`
}

/**
 * Generates a random stardate.
 *
 * @returns {number} a stardate between 41000 (inclusive) and 42000 (exclusive).
 */
export function randomStardate() {
    return generateRandom(41000,42000)
}



/**
 * Generates a random planet class.
 *
 * @returns {string} a one-letter planet class.
 */
export function randomPlanetClass() {
  const planetClases = "DHJKLMNRTY"
  return planetClases[Math.floor(Math.random() * planetClases.length)];
}
