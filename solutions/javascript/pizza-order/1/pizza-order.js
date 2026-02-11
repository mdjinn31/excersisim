/// <reference path="./global.d.ts" />
//
// @ts-check

const PIZZAS = {
      'Margherita'     : 7,
      'Caprese'        : 9,
      'Formaggio'      :10,
      'ExtraSauce'     : 1,
      'ExtraToppings'  : 2
}

/**
 * Determine the price of the pizza given the pizza and optional extras
 *
 * @param {Pizza} pizza name of the pizza to be made
 * @param {Extra[]} extras list of extras
 *
 * @returns {number} the price of the pizza
 */
export function pizzaPrice(pizza, ...extras) {
    const extra = extras.shift()
    switch (extra) {
        case 'ExtraSauce': 
          return 1 + pizzaPrice(pizza, ...extras);
        break
        case 'ExtraToppings': 
          return 2 + pizzaPrice(pizza, ...extras);
        break
        default: 
          return PIZZAS[pizza];
  }
}

/**
 * Calculate the price of the total order, given individual orders
 *
 * (HINT: For this exercise, you can take a look at the supplied "global.d.ts" file
 * for a more info about the type definitions used)
 *
 * @param {PizzaOrder[]} pizzaOrders a list of pizza orders
 * @returns {number} the price of the total order

 */
export function orderPrice(pizzaOrders) {
    return (pizzaOrders.length === 0) ? 0 : pizzaOrders.reduce((r,o) => r + pizzaPrice(o.pizza,...o.extras),0)
}
