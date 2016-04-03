# NewsRestApi

GET  /news

@return [{id, title, date, text}]

GET  /news/:id

@return {id, title, date, text}

POST /news/:id [:title, :date, :text]

@return {id}

DELETE /news/:id

@return {success}
