// @ts-check

/**
 * Create an appointment
 *
 * @param {number} days
 * @param {number} [now] (ms since the epoch, or undefined)
 *
 * @returns {Date} the appointment
 */
export function createAppointment(days, now = undefined) {
  return new Date((now ? now : new Date())+(24 * 60 * 60 * 1000 * days))
}

/**
 * Generate the appointment timestamp
 *
 * @param {Date} appointmentDate
 *
 * @returns {string} timestamp
 */
export function getAppointmentTimestamp(appointmentDate) {
    return appointmentDate.toISOString()
}

/**
 * Get details of an appointment
 *
 * @param {string} timestamp (ISO 8601)
 *
 * @returns {Record<'year' | 'month' | 'date' | 'hour' | 'minute', number>} the appointment details
 */
export function getAppointmentDetails(timestamp) {
  const unixTimeStamp = new Date(timestamp)
  return {
      year: unixTimeStamp.getFullYear(), 
      month: unixTimeStamp.getMonth(), 
      date: unixTimeStamp.getDate(), 
      hour: unixTimeStamp.getHours(), 
      minute: unixTimeStamp.getMinutes()
  }
}

/**
 * Update an appointment with given options
 *
 * @param {string} timestamp (ISO 8601)
 * @param {Partial<Record<'year' | 'month' | 'date' | 'hour' | 'minute', number>>} options
 *
 * @returns {Record<'year' | 'month' | 'date' | 'hour' | 'minute', number>} the appointment details
 */
export function updateAppointment(timestamp, options) {
  const dateObject = {...getAppointmentDetails(timestamp),...options}
  if (dateObject.hour === 24 && dateObject.minute === 60){
    dateObject.date += 1
    dateObject.hour = 1
    dateObject.minute = 0
  }
  if(dateObject.month === 1 && dateObject.date === 29){
    dateObject.month += 1
    dateObject.date = 1
  }
  return dateObject
}

/**
 * Get available time in seconds (rounded) between two appointments
 *
 * @param {string} timestampA (ISO 8601)
 * @param {string} timestampB (ISO 8601)
 *
 * @returns {number} amount of seconds (rounded)
 */
export function timeBetween(timestampA, timestampB) {
  return Math.round((new Date(timestampB)-(new Date(timestampA)))/1000); 
}

/**
 * Get available times between two appointment
 *
 * @param {string} appointmentTimestamp (ISO 8601)
 * @param {string} currentTimestamp (ISO 8601)
 */
export function isValid(appointmentTimestamp, currentTimestamp) {
  return new Date(appointmentTimestamp) > new Date(currentTimestamp)
}
