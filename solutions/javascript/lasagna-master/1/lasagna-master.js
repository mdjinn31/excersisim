/// <reference path="./global.d.ts" />
// @ts-check

/**
 * Implement the functions needed to solve the exercise here.
 * Do not forget to export them so they are available for the
 * tests. Here an example of the syntax as reminder:
 *
 * export function yourFunction(...) {
 *   ...
 * }
 */

export const cookingStatus = (time) => {
  if(time === '' || time === undefined || time === null) return 'You forgot to set the timer.'
  if(time > 0) return 'Not done, please wait.'
  return 'Lasagna is done.'
}

export const preparationTime = (layers, time =2) => layers.length * time

export const quantities = (layes) => {
  let [noodles,sauce] = [0,0]
  for (let i = 0; i < layes.length; i++) {
      if(layes[i]==='noodles') noodles += 50
      if(layes[i]==='sauce') sauce += 0.2
  }
  return {noodles,sauce}
}

export const addSecretIngredient = (friendList, myList) => {
    myList.push(friendList[friendList.length-1])
}

export const scaleRecipe = (recipe, portions) => {
  const scaled = {}
  for (let key in recipe) {
    scaled[key] = (recipe[key]/2)*portions
  }
  return scaled
}