define({ "api": [
  {
    "type": "post",
    "url": "/api/user/authenticate",
    "title": "Authenticate login request",
    "name": "AuthenticateUser",
    "group": "Authentication",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Users unique email.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Users password.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Session token of the User.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"token\": \"xxx\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "Unauthorized",
            "description": "<p>User credentials are not correct!.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 401 Unauthorized Access\n{\n     \"message\": \"User credentials are not correct!\",\n     \"status_code\": 401\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Auth/AuthController.php",
    "groupTitle": "Authentication"
  },
  {
    "type": "post",
    "url": "/api/token/refresh",
    "title": "Refresh the token of a logged in user",
    "name": "RefreshToken",
    "group": "Authentication",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>User unique token.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>User token.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"refreshToken\": \"xxx\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "Unauthorized",
            "description": "<p>Token is invalid.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 401 Unauthorized\n{\n     \"message\": \"Token is invalid | Token has expired | Token is blacklisted\",\n     \"status_code\": 401\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Auth/AuthController.php",
    "groupTitle": "Authentication"
  },
  {
    "type": "post",
    "url": "/api/user/checkout",
    "title": "Checkout action",
    "name": "CheckOut",
    "group": "CheckOut",
    "examples": [
      {
        "title": "Example Usage",
        "content": "{\n        \"store_name\": \"Amazon\",\n        \"store_url\": \"https:://www.amazon.com\",\n        \"total_price\": 120000,\n        \"items\": [\n            {\n                \"asin_code\": \"B01FFQEWE8\",\n                \"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n                \"price\": 189799,\n                \"quantity\": 1,\n                \"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n                \"color\": \"Black\",\n                \"weight\": 67.5,\n                \"length\": 6220,\n                \"width\": 3700,\n                \"height\": 800,\n                \"size\": \"50x30\"\n            }\n        ]\n     }",
        "type": "json"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "iframeSource",
            "description": "<p>Pesapal iframe source.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n     \"iframeSource\": {\n         \"GET&http%3A%2F%2Fdemo.pesapal.com%2Fapi%2FPostPesapalDirectOrderV4&oauth_callback%3Dhttp%253A%252F%252Fshopbuddy.co.ke%252Fpayments%252Fcallback%26oauth_consumer_key%3D2WVcrLQku%252Fh1dgOU0oTUOgTjGYq%252BZity%26oauth_nonce%3D%257BEBF66D2C-FC11-5D37-0854-BF20278E1E7C%257D%26oauth_signature_method%3DHMAC-SHA1%26oauth_timestamp%3D1469730513%26oauth_version%3D1.0%26pesapal_request_data%3D%2526lt%253B%253Fxml%2520version%253D%2526quot%253B1.0%2526quot%253B%2520encoding%253D%2526quot%253Butf-8%2526quot%253B%253F%2526gt%253B%2526lt%253BPesapalDirectOrderInfo%2520xmlns%253Axsi%253D%2526quot%253Bhttp%253A%252F%252Fwww.w3.org%252F2001%252FXMLSchema-instance%2526quot%253B%2520xmlns%253Axsd%253D%2526quot%253Bhttp%253A%252F%252Fwww.w3.org%252F2001%252FXMLSchema%2526quot%253B%2520Amount%253D%2526quot%253B120000%2526quot%253B%2520Description%253D%2526quot%253BORDER%2520DESCRIPTION%2526quot%253B%2520Type%253D%2526quot%253BMERCHANT%2526quot%253B%2520Reference%253D%2526quot%253B4%2526quot%253B%2520FirstName%253D%2526quot%253BRonnie%2526quot%253B%2520LastName%253D%2526quot%253BNyaga%2526quot%253B%2520Email%253D%2526quot%253Bronnienyaga%2540gmail.com%2526quot%253B%2520PhoneNumber%253D%2526quot%253B%2526quot%253B%2520xmlns%253D%2526quot%253Bhttp%253A%252F%252Fwww.pesapal.com%2526quot%253B%2520%252F%2526gt%253B\"\n            }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "Exception",
            "description": "<p>Something went wrong.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 500 Exception\n{\n     \"message\": \"Something went wrong.\",\n      \"status_code\": 500\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/CheckoutController.php",
    "groupTitle": "CheckOut"
  },
  {
    "type": "post",
    "url": "/api/products/attributes",
    "title": "Query attributes of Amazon products",
    "name": "GetAmazonProducts",
    "group": "CheckOut",
    "examples": [
      {
        "title": "Example Usage",
        "content": "{\n           \"asin_codes\": [\n               \"B01FFQEWE8\",\n               \"B01FFQEWE8\"\n           ]\n}",
        "type": "json"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "json",
            "optional": false,
            "field": "attributes",
            "description": "<p>Attributes JSON response.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    HTTP/1.1 200 OK\n\n{\n    \"attributes\": [\n    {\n        \"B01FFQEWE8\": {\n            \"weight\": {\n                \"0\": \"7900\",\n                      \"@attributes\": {\n                    \"Units\": \"hundredths-pounds\"\n                      }\n                    },\n            \"length\": {\n                \"0\": \"6220\",\n                      \"@attributes\": {\n                    \"Units\": \"hundredths-inches\"\n                      }\n                    },\n                    \"width\": {\n                \"0\": \"3700\",\n                      \"@attributes\": {\n                    \"Units\": \"hundredths-inches\"\n                      }\n                    },\n                    \"height\": {\n                \"0\": \"800\",\n                      \"@attributes\": {\n                    \"Units\": \"hundredths-inches\"\n                      }\n                    },\n                    \"color\": {\n                \"0\": \"Black\"\n                    },\n                    \"amount\": {\n                \"0\": \"198929\"\n                    },\n                    \"currency_code\": {\n                \"0\": \"USD\"\n                    },\n                    \"formatted_price\": {\n                \"0\": \"$1,989.29\"\n                    }\n                  }\n                },\n                {\n                    \"B01FFQEWE8\": {\n                    \"weight\": {\n                        \"0\": \"7900\",\n                      \"@attributes\": {\n                            \"Units\": \"hundredths-pounds\"\n                      }\n                    },\n                    \"length\": {\n                        \"0\": \"6220\",\n                      \"@attributes\": {\n                            \"Units\": \"hundredths-inches\"\n                      }\n                    },\n                    \"width\": {\n                        \"0\": \"3700\",\n                      \"@attributes\": {\n                            \"Units\": \"hundredths-inches\"\n                      }\n                    },\n                    \"height\": {\n                        \"0\": \"800\",\n                      \"@attributes\": {\n                            \"Units\": \"hundredths-inches\"\n                      }\n                    },\n                    \"color\": {\n                        \"0\": \"Black\"\n                    },\n                    \"amount\": {\n                        \"0\": \"198929\"\n                    },\n                    \"currency_code\": {\n                        \"0\": \"USD\"\n                    },\n                    \"formatted_price\": {\n                        \"0\": \"$1,989.29\"\n                    }\n                }\n        }\n    ]\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "Exception",
            "description": "<p>Something went wrong.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 500 Exception\n{\n     \"message\": \"Something went wrong.\",\n      \"status_code\": 500\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/CheckoutController.php",
    "groupTitle": "CheckOut"
  },
  {
    "type": "post",
    "url": "/api/user",
    "title": "Request User information using the token",
    "name": "GetUser",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Users unique token.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the User.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email of the User.</p>"
          },
          {
            "group": "Success 200",
            "type": "Datetime",
            "optional": false,
            "field": "created_at",
            "description": "<p>Date and time when the User was created.</p>"
          },
          {
            "group": "Success 200",
            "type": "Datetime",
            "optional": false,
            "field": "updated_at",
            "description": "<p>Date and time when the User was updated.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n     \"user\": [\n         \"name\": \"John Doe\",\n         \"email\": \"john.doe@gmail.com\",\n         \"created_at\": \"2016-07-21 05:33:49\",\n         \"updated_at\": \"2016-07-21 05:33:49\"\n     ]\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "UserNotFound",
            "description": "<p>The id of the User was not found.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 401 Not Found\n{\n     \"message\": \"Token is invalid\",\n     \"status_code\": 500,\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Auth/AuthController.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/api/user",
    "title": "Register a new user and give them a default role of 'customer'",
    "name": "RegisterUser",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Users name.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Users email.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Users password.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password_confirmation",
            "description": "<p>Users password confirmation.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>User token.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"token\": \"xxx\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "ValidationException",
            "description": "<p>Input failed validation.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n     \"message\": \"The given data failed to pass validation.\",\n      \"status_code\": 500\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Auth/AuthController.php",
    "groupTitle": "User"
  }
] });
