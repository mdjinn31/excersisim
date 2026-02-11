// @ts-check

export const SPLIT_NAME = /([a-z]+), ([a-z]+)/i
export const EMOJI = /emoji[0-9]+/gi
export const INPUT = /(\w+)(?<=\w+)\.(?=\w+)(\w+)/gi

/**
 * Given a certain command, help the chatbot recognize whether the command is valid or not.
 *
 * @param {string} command
 * @returns {boolean} whether or not is the command valid
 */

export function isValidCommand(command) {
    return /^chatbot/gi.test(command)
}

/**
 * Given a certain message, help the chatbot get rid of all the emoji's encryption through the message.
 *
 * @param {string} message
 * @returns {string} The message without the emojis encryption
 */
export function removeEmoji(message) {
   return message.replaceAll(EMOJI,'')
}

/**
 * Given a certain phone number, help the chatbot recognize whether it is in the correct format.
 *
 * @param {string} number
 * @returns {string} the Chatbot response to the phone Validation
 */
export const checkPhoneNumber = (number) => {
  return (/^\(\+[0-9][0-9]\) [0-9]{3}-[0-9]{3}-[0-9]{3}$/.test(number))
        ? `Thanks! You can now download me to your phone.`
        : `Oops, it seems like I can't reach out to ${number}`
}

/**
 * Given a certain response from the user, help the chatbot get only the URL.
 *
 * @param {string} userInput
 * @returns {string[] | null} all the possible URL's that the user may have answered
 */
export const getURL = (userInput) => userInput.match(INPUT)

/**
 * Greet the user using the full name data from the profile.
 *
 * @param {string} fullName
 * @returns {string} Greeting from the chatbot
 */

export const niceToMeetYou = (fullName) => `Nice to meet you, ${fullName.replace(SPLIT_NAME, '$2 $1')}`