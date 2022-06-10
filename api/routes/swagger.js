const swaggerUi = require('swagger-ui-express');
const swaggerDocument = require('./swagger.json');

app.get('/api-docs', swaggerUi.setup(swaggerDocument));