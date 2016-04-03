# NewsRestApi

GET  /news

@return [{id, title, date, text}]

GET  /news/:id

@return {id, title, date, text}

POST /news/ [:title, :date, :text]

@return {id}

POST /news/:id [:title, :date, :text]

@return {success}

DELETE /news/:id

@return {success}
