define({ "api": [
  {
    "type": "post",
    "url": "/api/user/authenticate",
    "title": "Authenticate user",
    "version": "0.1.0",
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
          "content": "HTTP/1.1 200 OK\n{\n     \"currentUser\":\n     {\n         \"id\": 8,\n         \"name\": \"Tom Keen\",\n         \"email\": \"tom.keen@gmail.com\",\n         \"created_at\": \"2016-08-01 06:07:20\",\n         \"updated_at\": \"2016-08-01 06:07:20\"\n     },\n     \"token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgsImlzcyI6Imh0dHA6XC9cL3Nob3BidWRkeS5kZXZcL2FwaVwvdXNlclwvcmVnaXN0ZXIiLCJpYXQiOjE0NzAwMzE2NDAsImV4cCI6MTQ3MDAzNTI0MCwibmJmIjoxNDcwMDMxNjQwLCJqdGkiOiIwNWM0ZWZjNTdmMDNiZmMwZGY4M2QwZWNkODUwYmNiZiJ9.422Hp7oxcd_lG07us1nnuGfbVtyqVsLp_CNpO4n-qhY\"\n}",
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
    "filename": "app/Http/Controllers/Auth/AuthController.php",
    "groupTitle": "Authentication"
  },
  {
    "type": "post",
    "url": "/api/token/refresh",
    "title": "Refresh token",
    "version": "0.1.0",
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
          "content": "HTTP/1.1 200 OK\n{\n  \"refreshToken\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgsImlzcyI6Imh0dHA6XC9cL3Nob3BidWRkeS5kZXZcL2FwaVwvdXNlclwvcmVnaXN0ZXIiLCJpYXQiOjE0NzAwMzE2NDAsImV4cCI6MTQ3MDAzNTI0MCwibmJmIjoxNDcwMDMxNjQwLCJqdGkiOiIwNWM0ZWZjNTdmMDNiZmMwZGY4M2QwZWNkODUwYmNiZiJ9.422Hp7oxcd_lG07us1nnuGfbVtyqVsLp_CNpO4n-qhY\"\n}",
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
    "filename": "app/Http/Controllers/Auth/AuthController.php",
    "groupTitle": "Authentication"
  },
  {
    "type": "post",
    "url": "/api/carts",
    "title": "Create cart - Checkout action",
    "version": "0.1.0",
    "name": "CartCheckOut",
    "group": "Cart",
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
          "content": "HTTP/1.1 200 OK\n{\n     \"iframeSource\": \"GET&http%3A%2F%2Fdemo.pesapal.com%2Fapi%2FPostPesapalDirectOrderV4&oauth_callback%3Dhttp%253A%252F%252Fshopbuddy.co.ke%252Fpayments%252Fcallback%26oauth_consumer_key%3D2WVcrLQku%252Fh1dgOU0oTUOgTjGYq%252BZity%26oauth_nonce%3D%257BEBF66D2C-FC11-5D37-0854-BF20278E1E7C%257D%26oauth_signature_method%3DHMAC-SHA1%26oauth_timestamp%3D1469730513%26oauth_version%3D1.0%26pesapal_request_data%3D%2526lt%253B%253Fxml%2520version%253D%2526quot%253B1.0%2526quot%253B%2520encoding%253D%2526quot%253Butf-8%2526quot%253B%253F%2526gt%253B%2526lt%253BPesapalDirectOrderInfo%2520xmlns%253Axsi%253D%2526quot%253Bhttp%253A%252F%252Fwww.w3.org%252F2001%252FXMLSchema-instance%2526quot%253B%2520xmlns%253Axsd%253D%2526quot%253Bhttp%253A%252F%252Fwww.w3.org%252F2001%252FXMLSchema%2526quot%253B%2520Amount%253D%2526quot%253B120000%2526quot%253B%2520Description%253D%2526quot%253BORDER%2520DESCRIPTION%2526quot%253B%2520Type%253D%2526quot%253BMERCHANT%2526quot%253B%2520Reference%253D%2526quot%253B4%2526quot%253B%2520FirstName%253D%2526quot%253BRonnie%2526quot%253B%2520LastName%253D%2526quot%253BNyaga%2526quot%253B%2520Email%253D%2526quot%253Bronnienyaga%2540gmail.com%2526quot%253B%2520PhoneNumber%253D%2526quot%253B%2526quot%253B%2520xmlns%253D%2526quot%253Bhttp%253A%252F%252Fwww.pesapal.com%2526quot%253B%2520%252F%2526gt%253B\"\n}",
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
    "filename": "app/Http/Controllers/CheckoutController.php",
    "groupTitle": "Cart"
  },
  {
    "type": "delete",
    "url": "/api/carts/:id",
    "title": "Delete cart",
    "version": "0.1.0",
    "name": "DeleteCart",
    "group": "Cart",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "cartId",
            "description": "<p>ID of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeName",
            "description": "<p>Store name of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeURL",
            "description": "<p>Store URL of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "totalPrice",
            "description": "<p>Total price of the Cart.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\":\n            {\n                \"cartId\": 4,\n                \"storeName\": \"Amazon\",\n                \"storeURL\": \"https:://www.amazon.com\",\n                \"totalPrice\": 9999.99,\n                \"createdAt\": \"2016-07-21 11:27:36\"\n            }\n        }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/CartsController.php",
    "groupTitle": "Cart"
  },
  {
    "type": "get",
    "url": "/api/carts/:id",
    "title": "Fetch one cart",
    "version": "0.1.0",
    "name": "GetCart",
    "group": "Cart",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "cartId",
            "description": "<p>ID of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeName",
            "description": "<p>Store name of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeURL",
            "description": "<p>Store URL of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "totalPrice",
            "description": "<p>Total price of the Cart.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\":\n            {\n                \"cartId\": 4,\n                \"storeName\": \"Amazon\",\n                \"storeURL\": \"https:://www.amazon.com\",\n                \"totalPrice\": 9999.99,\n                \"createdAt\": \"2016-07-21 11:27:36\"\n            }\n        }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/CartsController.php",
    "groupTitle": "Cart"
  },
  {
    "type": "get",
    "url": "/api/carts",
    "title": "Fetch all carts",
    "version": "0.1.0",
    "name": "GetCarts",
    "group": "Cart",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "cartId",
            "description": "<p>ID of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeName",
            "description": "<p>Store name of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeURL",
            "description": "<p>Store URL of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "totalPrice",
            "description": "<p>Total price of the Cart.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\": [\n            {\n                \"cartId\": 4,\n                \"storeName\": \"Amazon\",\n                \"storeURL\": \"https:://www.amazon.com\",\n                \"totalPrice\": 9999.99,\n                \"createdAt\": \"2016-07-21 11:27:36\"\n            }\n            ]\n        }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/CartsController.php",
    "groupTitle": "Cart"
  },
  {
    "type": "put",
    "url": "/api/carts/:id",
    "title": "Update cart",
    "version": "0.1.0",
    "name": "UpdateCart",
    "group": "Cart",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "cartId",
            "description": "<p>ID of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeName",
            "description": "<p>Store name of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeURL",
            "description": "<p>Store URL of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "totalPrice",
            "description": "<p>Total price of the Cart.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\":\n            {\n                \"cartId\": 4,\n                \"storeName\": \"Amazon\",\n                \"storeURL\": \"https:://www.amazon.com\",\n                \"totalPrice\": 9999.99,\n                \"createdAt\": \"2016-07-21 11:27:36\"\n            }\n        }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/CartsController.php",
    "groupTitle": "Cart"
  },
  {
    "type": "get",
    "url": "/api/carts/:id?include=user",
    "title": "Fetch one cart - Include owner",
    "version": "0.1.0",
    "name": "GetCartIncludeOwner",
    "group": "Cart_Extension",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "cartId",
            "description": "<p>ID of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeName",
            "description": "<p>Store name of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeURL",
            "description": "<p>Store URL of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "totalPrice",
            "description": "<p>Total price of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "object",
            "optional": false,
            "field": "user",
            "description": "<p>Owner of the cart.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\":\n            {\n                \"cartId\": 4,\n                \"storeName\": \"Amazon\",\n                \"storeURL\": \"https:://www.amazon.com\",\n                \"totalPrice\": 9999.99,\n                \"createdAt\": \"2016-07-21 11:27:36\"\n                \"user\": {\n                    \"data\": {\n                        \"userId\": 1,\n                        \"roles\": null,\n                        \"name\": \"Ronnie Nyaga\",\n                        \"email\": \"ronnienyaga@gmail.com\"\n                    }\n                }\n            }\n        }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/CartsController.php",
    "groupTitle": "Cart_Extension"
  },
  {
    "type": "get",
    "url": "/api/carts/:id?include=payment",
    "title": "Fetch one cart - Include payment",
    "version": "0.1.0",
    "name": "GetCartIncludePayment",
    "group": "Cart_Extension",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "cartId",
            "description": "<p>ID of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeName",
            "description": "<p>Store name of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeURL",
            "description": "<p>Store URL of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "totalPrice",
            "description": "<p>Total price of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "object",
            "optional": false,
            "field": "payment",
            "description": "<p>Payment of the cart.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\":\n            {\n                \"cartId\": 4,\n                \"storeName\": \"Amazon\",\n                \"storeURL\": \"https:://www.amazon.com\",\n                \"totalPrice\": 9999.99,\n                \"createdAt\": \"2016-07-21 11:27:36\"\n                \"payment\": {\n                    \"data\": {\n                        \"paymentId\": 4,\n                        \"transaction_tracking_id\": \"\",\n                        \"merchant_reference\": \"4\",\n                        \"status\": \"PENDING\"\n                    }\n                }\n            }\n        }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/CartsController.php",
    "groupTitle": "Cart_Extension"
  },
  {
    "type": "get",
    "url": "/api/carts/:id?include=products",
    "title": "Fetch one cart - Include products",
    "version": "0.1.0",
    "name": "GetCartIncludeProducts",
    "group": "Cart_Extension",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "cartId",
            "description": "<p>ID of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeName",
            "description": "<p>Store name of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeURL",
            "description": "<p>Store URL of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "totalPrice",
            "description": "<p>Total price of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "object",
            "optional": false,
            "field": "products",
            "description": "<p>Products of the cart.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\":\n            {\n                \"cartId\": 4,\n                \"storeName\": \"Amazon\",\n                \"storeURL\": \"https:://www.amazon.com\",\n                \"totalPrice\": 9999.99,\n                \"createdAt\": \"2016-07-21 11:27:36\"\n                \"products\": {\n                    \"data\": [\n                    {\n                        \"productId\": 10,\n                        \"asinCode\": \"B01FFQEWE8\",\n                        \"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n                        \"price\": 9999.99,\n                        \"quantity\": 1,\n                        \"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n                        \"color\": \"Black\",\n                        \"weight\": \"67.50\",\n                        \"length\": \"999.99\",\n                        \"width\": \"999.99\",\n                        \"height\": \"800.00\",\n                        \"size\": \"50.00\"\n                    }\n                    ]\n                }\n            }\n        }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/CartsController.php",
    "groupTitle": "Cart_Extension"
  },
  {
    "type": "get",
    "url": "/api/carts/:id?include=shipments",
    "title": "Fetch one cart - Include shipments",
    "version": "0.1.0",
    "name": "GetCartIncludeShipments",
    "group": "Cart_Extension",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "cartId",
            "description": "<p>ID of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeName",
            "description": "<p>Store name of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeURL",
            "description": "<p>Store URL of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "totalPrice",
            "description": "<p>Total price of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "objects",
            "optional": false,
            "field": "shipments",
            "description": "<p>Shipments of the cart.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\":\n            {\n                \"cartId\": 4,\n                \"storeName\": \"Amazon\",\n                \"storeURL\": \"https:://www.amazon.com\",\n                \"totalPrice\": 9999.99,\n                \"createdAt\": \"2016-07-21 11:27:36\"\n                \"shipments\": {\n                    \"data\": [\n                    {\n                        \"shipmentId\": 1,\n                        \"status\": \"In warehouse\",\n                        \"comment\": \"No comment\",\n                        \"date\": \"2016-07-21 11:25:24\"\n                    }\n                    ]\n                }\n            }\n        }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/CartsController.php",
    "groupTitle": "Cart_Extension"
  },
  {
    "type": "get",
    "url": "/api/carts?include=user",
    "title": "Fetch all carts - Include owner",
    "version": "0.1.0",
    "name": "GetCartsIncludeOwner",
    "group": "Cart_Extension",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "cartId",
            "description": "<p>ID of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeName",
            "description": "<p>Store name of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeURL",
            "description": "<p>Store URL of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "totalPrice",
            "description": "<p>Total price of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "object",
            "optional": false,
            "field": "user",
            "description": "<p>Owner of the cart.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\": [\n            {\n                \"cartId\": 4,\n                \"storeName\": \"Amazon\",\n                \"storeURL\": \"https:://www.amazon.com\",\n                \"totalPrice\": 9999.99,\n                \"createdAT\": \"2016-07-21 11:27:36\",\n                \"user\": {\n                    \"data\": {\n                        \"userId\": 1,\n                        \"roles\": null,\n                        \"name\": \"Ronnie Nyaga\",\n                        \"email\": \"ronnienyaga@gmail.com\"\n                    }\n                }\n            }\n            ]\n        }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/CartsController.php",
    "groupTitle": "Cart_Extension"
  },
  {
    "type": "get",
    "url": "/api/carts?include=payment",
    "title": "Fetch all carts - Include payment",
    "version": "0.1.0",
    "name": "GetCartsIncludePayment",
    "group": "Cart_Extension",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "cartId",
            "description": "<p>ID of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeName",
            "description": "<p>Store name of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeURL",
            "description": "<p>Store URL of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "totalPrice",
            "description": "<p>Total price of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "object",
            "optional": false,
            "field": "payment",
            "description": "<p>Payment of the cart.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\": [\n            {\n                \"cartId\": 4,\n                \"storeName\": \"Amazon\",\n                \"storeURL\": \"https:://www.amazon.com\",\n                \"totalPrice\": 9999.99,\n                \"createdAt\": \"2016-07-21 11:27:36\",\n                \"payment\": {\n                    \"data\": {\n                        \"paymentId\": 4,\n                        \"transaction_tracking_id\": \"\",\n                        \"merchant_reference\": \"4\",\n                        \"status\": \"PENDING\"\n                    }\n                }\n            }\n            ]\n        }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/CartsController.php",
    "groupTitle": "Cart_Extension"
  },
  {
    "type": "get",
    "url": "/api/carts?include=products",
    "title": "Fetch all carts - Include products",
    "version": "0.1.0",
    "name": "GetCartsIncludeProducts",
    "group": "Cart_Extension",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "cartId",
            "description": "<p>ID of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeName",
            "description": "<p>Store name of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeURL",
            "description": "<p>Store URL of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "totalPrice",
            "description": "<p>Total price of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "object",
            "optional": false,
            "field": "products",
            "description": "<p>Products of the cart.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\": [\n            {\n                \"cartId\": 4,\n                \"storeName\": \"Amazon\",\n                \"storeURL\": \"https:://www.amazon.com\",\n                \"totalPrice\": 9999.99,\n                \"createdAt\": \"2016-07-21 11:27:36\",\n                \"products\": {\n                    \"data\": [\n                    {\n                        \"productId\": 10,\n                        \"asinCode\": \"B01FFQEWE8\",\n                        \"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n                        \"price\": 9999.99,\n                        \"quantity\": 1,\n                        \"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n                        \"color\": \"Black\",\n                        \"weight\": \"67.50\",\n                        \"length\": \"999.99\",\n                        \"width\": \"999.99\",\n                        \"height\": \"800.00\",\n                        \"size\": \"50.00\"\n                    }\n                    ]\n                }\n            }\n            ]\n        }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/CartsController.php",
    "groupTitle": "Cart_Extension"
  },
  {
    "type": "get",
    "url": "/api/carts?include=shipments",
    "title": "Fetch all carts - Include shipments",
    "version": "0.1.0",
    "name": "GetCartsIncludeShipments",
    "group": "Cart_Extension",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "cartId",
            "description": "<p>ID of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeName",
            "description": "<p>Store name of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeURL",
            "description": "<p>Store URL of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "totalPrice",
            "description": "<p>Total price of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "objects",
            "optional": false,
            "field": "shipments",
            "description": "<p>Shipments of the cart.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\": [\n            {\n                \"cartId\": 4,\n                \"storeName\": \"Amazon\",\n                \"storeURL\": \"https:://www.amazon.com\",\n                \"totalPrice\": 9999.99,\n                \"createdAt\": \"2016-07-21 11:27:36\",\n                \"shipments\": {\n                    \"data\": [\n                    {\n                        \"shipmentId\": 1,\n                        \"status\": \"In warehouse\",\n                        \"comment\": \"No comment\",\n                        \"date\": \"2016-07-21 11:25:24\"\n                    }\n                    ]\n                }\n            }\n            ]\n        }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/CartsController.php",
    "groupTitle": "Cart_Extension"
  },
  {
    "type": "post",
    "url": "/carts/shipments/:cartId",
    "title": "Create shipment (order status)",
    "version": "0.2.0",
    "name": "CreateCartShipment",
    "group": "Order_Status",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "shipmentID",
            "description": "<p>ID of the Shipment/Order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>The status of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "comment",
            "description": "<p>A comment on the status of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "date",
            "description": "<p>The date the status was changed.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\": [\n            {\n                \"shipmentId\": 4,\n                \"status\": \"Delivered\",\n                \"comment\": \"Received by the customer\",\n                \"date\": \"2016-07-21 11:27:36\"\n            }\n            ]\n        }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/ShipmentsController.php",
    "groupTitle": "Order_Status"
  },
  {
    "type": "delete",
    "url": "/shipments/:id",
    "title": "Delete shipment (order status)",
    "version": "0.2.0",
    "name": "DeleteShipment",
    "group": "Order_Status",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "shipmentID",
            "description": "<p>ID of the Shipment/Order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>The status of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "comment",
            "description": "<p>A comment on the status of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "date",
            "description": "<p>The date the status was changed.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\": [\n            {\n                \"shipmentId\": 4,\n                \"status\": \"Delivered\",\n                \"comment\": \"Received by the customer\",\n                \"date\": \"2016-07-21 11:27:36\"\n            }\n            ]\n        }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/ShipmentsController.php",
    "groupTitle": "Order_Status"
  },
  {
    "type": "get",
    "url": "/carts/shipments/:cartId",
    "title": "Fetch cart shipments (order status)",
    "version": "0.2.0",
    "name": "GetCartShipments",
    "group": "Order_Status",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "shipmentID",
            "description": "<p>ID of the Shipment/Order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>The status of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "comment",
            "description": "<p>A comment on the status of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "date",
            "description": "<p>The date the status was changed.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\": [\n            {\n                    \"shipmentId\": 4,\n                    \"status\": \"In Warehouse\",\n                    \"comment\": \"Order awaiting shipping\",\n                    \"date\": \"20th June 2016\"\n            }\n            ]\n    }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/ShipmentsController.php",
    "groupTitle": "Order_Status"
  },
  {
    "type": "get",
    "url": "/shipments/:id",
    "title": "Fetch one shipment (order status)",
    "version": "0.2.0",
    "name": "GetShipment",
    "group": "Order_Status",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "shipmentID",
            "description": "<p>ID of the Shipment/Order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>The status of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "comment",
            "description": "<p>A comment on the status of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "date",
            "description": "<p>The date the status was changed.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\": [\n            {\n                \"shipmentId\": 4,\n                \"status\": \"Delivered\",\n                \"comment\": \"Received by the customer\",\n                \"date\": \"2016-07-21 11:27:36\"\n            }\n            ]\n        }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/ShipmentsController.php",
    "groupTitle": "Order_Status"
  },
  {
    "type": "put",
    "url": "/shipments/:id",
    "title": "Update shipment (order status)",
    "version": "0.2.0",
    "name": "UpdateShipment",
    "group": "Order_Status",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "shipmentID",
            "description": "<p>ID of the Shipment/Order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>The status of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "comment",
            "description": "<p>A comment on the status of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "date",
            "description": "<p>The date the status was changed.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\": [\n            {\n                \"shipmentId\": 4,\n                \"status\": \"Delivered\",\n                \"comment\": \"Received by the customer\",\n                \"date\": \"2016-07-21 11:27:36\"\n            }\n            ]\n        }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/ShipmentsController.php",
    "groupTitle": "Order_Status"
  },
  {
    "type": "get",
    "url": "/carts/shipments/:cartId?include=cart",
    "title": "Fetch cart shipments (order status) - Include cart",
    "version": "0.2.0",
    "name": "GetCartShipmentsIncludeCart",
    "group": "Order_Status_Extension",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "cartId",
            "description": "<p>ID of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeName",
            "description": "<p>Store name of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeURL",
            "description": "<p>Store URL of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "totalPrice",
            "description": "<p>Total price of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "object",
            "optional": false,
            "field": "user",
            "description": "<p>Owner of the cart.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\": [\n            {\n                \"shipmentId\": 4,\n                \"status\": \"In Warehouse\",\n                \"comment\": \"Order awaiting shipping\",\n                \"date\": \"20th June 2016\",\n                \"data\": {\n                    \"cartId\": 4,\n                    \"storeName\": \"Amazon\",\n                    \"storeURL\": \"https:://www.amazon.com\",\n                    \"totalPrice\": 9999.99,\n                    \"createdAt\": \"16th June 2016\"\n                }\n            }\n            ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/ShipmentsController.php",
    "groupTitle": "Order_Status_Extension"
  },
  {
    "type": "get",
    "url": "/shipments/:id?include=cart",
    "title": "Fetch one shipment (order status) - Include cart",
    "version": "0.2.0",
    "name": "GetShipmentIncludeCart",
    "group": "Order_Status_Extension",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "cartId",
            "description": "<p>ID of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeName",
            "description": "<p>Store name of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "storeURL",
            "description": "<p>Store URL of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "totalPrice",
            "description": "<p>Total price of the Cart.</p>"
          },
          {
            "group": "Success 200",
            "type": "object",
            "optional": false,
            "field": "user",
            "description": "<p>Owner of the cart.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\": [\n            {\n                \"shipmentID\": 4,\n                \"status\": \"In Warehouse\",\n                \"comment\": \"Order awaiting shipping\",\n                \"date\": \"20th June 2016\",\n                \"data\": {\n                    \"cartId\": 4,\n                    \"storeName\": \"Amazon\",\n                    \"storeURL\": \"https:://www.amazon.com\",\n                    \"totalPrice\": 9999.99,\n                    \"createdAt\": \"16th June 2016\"\n                }\n            }\n            ]\n        }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/ShipmentsController.php",
    "groupTitle": "Order_Status_Extension"
  },
  {
    "type": "delete",
    "url": "/api/products/:id",
    "title": "Delete product",
    "version": "0.2.0",
    "name": "DeleteProduct",
    "group": "Product",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "asin_code",
            "description": "<p>Role of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "price",
            "description": "<p>Price of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "quantity",
            "description": "<p>Quantity of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "url",
            "description": "<p>URL of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "color",
            "description": "<p>Color of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "weight",
            "description": "<p>Weight of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "length",
            "description": "<p>Length of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "width",
            "description": "<p>Width of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "height",
            "description": "<p>Height of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "size",
            "description": "<p>Size of the Product.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n     \"data\":\n     {\n         \"productId\": 1,\n         \"asin_code\": \"B01FFQEWE8\",\n         \"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n         \"price\": 9999.90,\n         \"quantity\": 1,\n         \"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n         \"color\": \"Black\",\n         \"weight\": 4.50,\n         \"length\": 50.70,\n         \"width\": 50.70,\n         \"height\": 50.70,\n         \"size\": 50.70,\n     }\n }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/ProductsController.php",
    "groupTitle": "Product"
  },
  {
    "type": "post",
    "url": "/api/products/attributes",
    "title": "Fetch Amazon products' attributes",
    "version": "0.1.0",
    "name": "GetAmazonProducts",
    "group": "Product",
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
    "filename": "app/Http/Controllers/CheckoutController.php",
    "groupTitle": "Product"
  },
  {
    "type": "get",
    "url": "/api/carts/:id/products",
    "title": "Fetch all cart products",
    "version": "0.2.0",
    "name": "GetCartProducts",
    "group": "Product",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "asin_code",
            "description": "<p>Role of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "price",
            "description": "<p>Price of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "quantity",
            "description": "<p>Quantity of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "url",
            "description": "<p>URL of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "color",
            "description": "<p>Color of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "weight",
            "description": "<p>Weight of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "length",
            "description": "<p>Length of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "width",
            "description": "<p>Width of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "height",
            "description": "<p>Height of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "size",
            "description": "<p>Size of the Product.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"data\": [\n  {\n         \"productId\": 1,\n         \"asin_code\": \"B01FFQEWE8\",\n         \"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n         \"price\": 9999.90,\n         \"quantity\": 1,\n         \"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n         \"color\": \"Black\",\n         \"weight\": 4.50,\n         \"length\": 50.70,\n         \"width\": 50.70,\n         \"height\": 50.70,\n         \"size\": 50.70\n     }\n     ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/ProductsController.php",
    "groupTitle": "Product"
  },
  {
    "type": "get",
    "url": "/api/products/:id",
    "title": "Fetch one product",
    "version": "0.2.0",
    "name": "GetProduct",
    "group": "Product",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "asin_code",
            "description": "<p>Role of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "price",
            "description": "<p>Price of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "quantity",
            "description": "<p>Quantity of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "url",
            "description": "<p>URL of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "color",
            "description": "<p>Color of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "weight",
            "description": "<p>Weight of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "length",
            "description": "<p>Length of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "width",
            "description": "<p>Width of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "height",
            "description": "<p>Height of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "size",
            "description": "<p>Size of the Product.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\":\n            {\n         \"productId\": 1,\n         \"asin_code\": \"B01FFQEWE8\",\n         \"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n         \"price\": 9999.90,\n         \"quantity\": 1,\n         \"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n         \"color\": \"Black\",\n         \"weight\": 4.50,\n         \"length\": 50.70,\n         \"width\": 50.70,\n         \"height\": 50.70,\n         \"size\": 50.70,\n            }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/ProductsController.php",
    "groupTitle": "Product"
  },
  {
    "type": "get",
    "url": "/api/products",
    "title": "Fetch all products",
    "version": "0.2.0",
    "name": "GetProducts",
    "group": "Product",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "asin_code",
            "description": "<p>Role of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "price",
            "description": "<p>Price of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "quantity",
            "description": "<p>Quantity of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "url",
            "description": "<p>URL of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "color",
            "description": "<p>Color of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "weight",
            "description": "<p>Weight of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "length",
            "description": "<p>Length of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "width",
            "description": "<p>Width of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "height",
            "description": "<p>Height of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "size",
            "description": "<p>Size of the Product.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"data\": [\n  {\n         \"productId\": 1,\n         \"asin_code\": \"B01FFQEWE8\",\n         \"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n         \"price\": 9999.90,\n         \"quantity\": 1,\n         \"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n         \"color\": \"Black\",\n         \"weight\": 4.50,\n         \"length\": 50.70,\n         \"width\": 50.70,\n         \"height\": 50.70,\n         \"size\": 50.70\n     }\n     ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/ProductsController.php",
    "groupTitle": "Product"
  },
  {
    "type": "put",
    "url": "/api/products/:id",
    "title": "Update product",
    "version": "0.2.0",
    "name": "UpdateProduct",
    "group": "Product",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "asin_code",
            "description": "<p>Role of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "price",
            "description": "<p>Price of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "quantity",
            "description": "<p>Quantity of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "url",
            "description": "<p>URL of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "color",
            "description": "<p>Color of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "weight",
            "description": "<p>Weight of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "length",
            "description": "<p>Length of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "width",
            "description": "<p>Width of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "height",
            "description": "<p>Height of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "size",
            "description": "<p>Size of the Product.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n            \"data\":\n            {\n         \"productId\": 1,\n         \"asin_code\": \"B01FFQEWE8\",\n         \"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n         \"price\": 9999.90,\n         \"quantity\": 1,\n         \"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n         \"color\": \"Black\",\n         \"weight\": 4.50,\n         \"length\": 50.70,\n         \"width\": 50.70,\n         \"height\": 50.70,\n         \"size\": 50.70,\n            }\n        }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/ProductsController.php",
    "groupTitle": "Product"
  },
  {
    "type": "get",
    "url": "/api/carts/:id/products?include=cart",
    "title": "Fetch all cart products - Include cart",
    "version": "0.2.0",
    "name": "GetCartProductsIncludeCart",
    "group": "Product_Extension",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "asin_code",
            "description": "<p>Role of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "price",
            "description": "<p>Price of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "quantity",
            "description": "<p>Quantity of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "url",
            "description": "<p>URL of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "color",
            "description": "<p>Color of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "weight",
            "description": "<p>Weight of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "length",
            "description": "<p>Length of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "width",
            "description": "<p>Width of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "height",
            "description": "<p>Height of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "size",
            "description": "<p>Size of the Product.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"data\": [\n  {\n         \"productId\": 1,\n         \"asin_code\": \"B01FFQEWE8\",\n         \"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n         \"price\": 9999.90,\n         \"quantity\": 1,\n         \"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n         \"color\": \"Black\",\n         \"weight\": 4.50,\n         \"length\": 50.70,\n         \"width\": 50.70,\n         \"height\": 50.70,\n         \"size\": 50.70,\n         \"cart\":\n         {\n             \"cartId\": 4,\n                    \"storeName\": \"Amazon\",\n                    \"storeURL\": \"https:://www.amazon.com\",\n                    \"totalPrice\": 9999.99,\n                    \"createdAt\": \"2016-07-21 11:27:36\"\n         }\n     }\n     ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/ProductsController.php",
    "groupTitle": "Product_Extension"
  },
  {
    "type": "get",
    "url": "/api/carts/:id/products?include=cart",
    "title": "Fetch one product - Include cart",
    "version": "0.2.0",
    "name": "GetProductIncludeCart",
    "group": "Product_Extension",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "asin_code",
            "description": "<p>Role of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "price",
            "description": "<p>Price of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "quantity",
            "description": "<p>Quantity of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "url",
            "description": "<p>URL of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "color",
            "description": "<p>Color of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "weight",
            "description": "<p>Weight of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "length",
            "description": "<p>Length of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "width",
            "description": "<p>Width of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "height",
            "description": "<p>Height of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "size",
            "description": "<p>Size of the Product.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"data\": [\n  {\n         \"productId\": 1,\n         \"asin_code\": \"B01FFQEWE8\",\n         \"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n         \"price\": 9999.90,\n         \"quantity\": 1,\n         \"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n         \"color\": \"Black\",\n         \"weight\": 4.50,\n         \"length\": 50.70,\n         \"width\": 50.70,\n         \"height\": 50.70,\n         \"size\": 50.70,\n         \"cart\":\n         {\n             \"cartId\": 4,\n                    \"storeName\": \"Amazon\",\n                    \"storeURL\": \"https:://www.amazon.com\",\n                    \"totalPrice\": 9999.99,\n                    \"createdAt\": \"2016-07-21 11:27:36\"\n         }\n     }\n     ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/ProductsController.php",
    "groupTitle": "Product_Extension"
  },
  {
    "type": "get",
    "url": "/api/products?include=cart",
    "title": "Fetch all products - Include cart",
    "version": "0.2.0",
    "name": "GetProductsIncludeCart",
    "group": "Product_Extension",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "asin_code",
            "description": "<p>Role of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "price",
            "description": "<p>Price of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "quantity",
            "description": "<p>Quantity of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "url",
            "description": "<p>URL of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "color",
            "description": "<p>Color of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "weight",
            "description": "<p>Weight of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "length",
            "description": "<p>Length of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "width",
            "description": "<p>Width of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "height",
            "description": "<p>Height of the Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "size",
            "description": "<p>Size of the Product.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"data\": [\n  {\n         \"productId\": 1,\n         \"asin_code\": \"B01FFQEWE8\",\n         \"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n         \"price\": 9999.90,\n         \"quantity\": 1,\n         \"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n         \"color\": \"Black\",\n         \"weight\": 4.50,\n         \"length\": 50.70,\n         \"width\": 50.70,\n         \"height\": 50.70,\n         \"size\": 50.70,\n         \"cart\":\n         {\n             \"cartId\": 4,\n                    \"storeName\": \"Amazon\",\n                    \"storeURL\": \"https:://www.amazon.com\",\n                    \"totalPrice\": 9999.99,\n                    \"createdAt\": \"2016-07-21 11:27:36\"\n         }\n     }\n     ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/ProductsController.php",
    "groupTitle": "Product_Extension"
  },
  {
    "type": "post",
    "url": "/api/users",
    "title": "Create new user",
    "version": "0.1.0",
    "name": "CreateUser",
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
          "content": "HTTP/1.1 200 OK\n{\n     \"token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgsImlzcyI6Imh0dHA6XC9cL3Nob3BidWRkeS5kZXZcL2FwaVwvdXNlclwvcmVnaXN0ZXIiLCJpYXQiOjE0NzAwMzE2NDAsImV4cCI6MTQ3MDAzNTI0MCwibmJmIjoxNDcwMDMxNjQwLCJqdGkiOiIwNWM0ZWZjNTdmMDNiZmMwZGY4M2QwZWNkODUwYmNiZiJ9.422Hp7oxcd_lG07us1nnuGfbVtyqVsLp_CNpO4n-qhY\",\n            \"currentUser\": {\n                \"id\": 8,\n                \"name\": \"Tom Keen\",\n                \"email\": \"tom.keen@gmail.com\",\n                \"created_at\": \"2016-08-01 06:07:20\",\n                \"updated_at\": \"2016-08-01 06:07:20\"\n            }\n}",
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
    "filename": "app/Http/Controllers/Auth/AuthController.php",
    "groupTitle": "User"
  },
  {
    "type": "delete",
    "url": "/api/users/:id",
    "title": "Delete user",
    "version": "0.2.0",
    "name": "DeleteUser",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Users unique ID.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "userId",
            "description": "<p>ID of the User.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "roles",
            "description": "<p>Role of the User.</p>"
          },
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
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"data\": [\n         \"userId\": 1,\n         \"roles\": \"customer\",\n         \"name\": \"John Doe\",\n         \"email\": \"john.doe@gmail.com\"\n     ]\n}",
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
          "content": "HTTP/1.1 404 Not Found\n{\n  \"error\": \"UserNotFound\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/UsersController.php",
    "groupTitle": "User"
  },
  {
    "type": "get",
    "url": "/api/users/:id",
    "title": "Fetch one user",
    "version": "0.2.0",
    "name": "GetUser",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Users unique ID.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "userId",
            "description": "<p>ID of the User.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "roles",
            "description": "<p>Role of the User.</p>"
          },
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
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"data\": [\n         \"userId\": 1,\n         \"roles\": \"customer\",\n         \"name\": \"John Doe\",\n         \"email\": \"john.doe@gmail.com\"\n     ]\n}",
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
          "content": "HTTP/1.1 404 Not Found\n{\n  \"error\": \"UserNotFound\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/UsersController.php",
    "groupTitle": "User"
  },
  {
    "type": "get",
    "url": "/api/users",
    "title": "Fetch all users",
    "version": "0.2.0",
    "name": "GetUsers",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Users unique ID.</p>"
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
            "field": "roles",
            "description": "<p>Role of the User.</p>"
          },
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
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"data\": [\n  {\n         \"userId\": 1,\n         \"roles\": \"customer\",\n         \"name\": \"John Doe\",\n         \"email\": \"john.doe@gmail.com\"\n     }\n     ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/UsersController.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/api/users/sign-in-or-sign-up",
    "title": "Login/Create new user",
    "version": "0.1.0",
    "name": "LoginOrCreateUser",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
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
          "content": "HTTP/1.1 200 OK\n{\n     \"token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgsImlzcyI6Imh0dHA6XC9cL3Nob3BidWRkeS5kZXZcL2FwaVwvdXNlclwvcmVnaXN0ZXIiLCJpYXQiOjE0NzAwMzE2NDAsImV4cCI6MTQ3MDAzNTI0MCwibmJmIjoxNDcwMDMxNjQwLCJqdGkiOiIwNWM0ZWZjNTdmMDNiZmMwZGY4M2QwZWNkODUwYmNiZiJ9.422Hp7oxcd_lG07us1nnuGfbVtyqVsLp_CNpO4n-qhY\",\n            \"currentUser\": {\n            \"id\": 8,\n            \"name\": \"\",\n            \"email\": \"tom.keen@gmail.com\",\n            \"created_at\": \"2016-08-01 06:07:20\",\n            \"updated_at\": \"2016-08-01 06:07:20\"\n            }\n}",
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
    "filename": "app/Http/Controllers/Auth/AuthController.php",
    "groupTitle": "User"
  },
  {
    "type": "put",
    "url": "/api/users/:id",
    "title": "Update user",
    "version": "0.2.0",
    "name": "UpdateUser",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Users unique ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "role",
            "description": "<p>Role of the User.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the User.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email of the User.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "userId",
            "description": "<p>ID of the User.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "roles",
            "description": "<p>Role of the User.</p>"
          },
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
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"data\": [\n         \"userId\": 1,\n         \"roles\": \"customer\",\n         \"name\": \"John Doe\",\n         \"email\": \"john.doe@gmail.com\"\n     ]\n}",
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
          "content": "HTTP/1.1 404 Not Found\n{\n  \"error\": \"UserNotFound\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/UsersController.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/api/authenticated/user",
    "title": "Fetch authenticated user",
    "version": "0.1.0",
    "name": "GetAuthenticatedUser",
    "group": "User_Extension",
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
          "content": "HTTP/1.1 200 OK\n{\n     \"currentUser\": [\n         \"name\": \"John Doe\",\n         \"email\": \"john.doe@gmail.com\",\n         \"created_at\": \"2016-07-21 05:33:49\",\n         \"updated_at\": \"2016-07-21 05:33:49\"\n     ],\n            \"refreshToken\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgsImlzcyI6Imh0dHA6XC9cL3Nob3BidWRkeS5kZXZcL2FwaVwvdXNlclwvcmVnaXN0ZXIiLCJpYXQiOjE0NzAwMzE2NDAsImV4cCI6MTQ3MDAzNTI0MCwibmJmIjoxNDcwMDMxNjQwLCJqdGkiOiIwNWM0ZWZjNTdmMDNiZmMwZGY4M2QwZWNkODUwYmNiZiJ9.422Hp7oxcd_lG07us1nnuGfbVtyqVsLp_CNpO4n-qhY\"\n}",
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
    "filename": "app/Http/Controllers/Auth/AuthController.php",
    "groupTitle": "User_Extension"
  },
  {
    "type": "get",
    "url": "/api/users/:id?include=carts",
    "title": "Fetch one user - Include carts",
    "version": "0.2.0",
    "name": "GetUserIncludeCarts",
    "group": "User_Extension",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Users unique ID.</p>"
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
            "field": "roles",
            "description": "<p>Role of the User.</p>"
          },
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
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"data\":\n  {\n         \"userId\": 1,\n         \"roles\": \"customer\",\n         \"name\": \"John Doe\",\n         \"email\": \"john.doe@gmail.com\",\n         \"carts\": [\n         {\n             \"cartId\": 4,\n             \"storeName\": \"Amazon\",\n             \"storeURL\": \"https:://www.amazon.com\",\n              \"totalPrice\": 9999.99,\n              \"createdAt\": \"2016-07-21 11:27:36\"\n         }\n         ]\n     }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/UsersController.php",
    "groupTitle": "User_Extension"
  },
  {
    "type": "get",
    "url": "/api/users/transactions/:id?include=products,payment,shipments",
    "title": "User Transaction History",
    "name": "GetUserTransactionHistory",
    "group": "User_Extension",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n\n{\n\"data\": [\n{\n\"cartId\": 1,\n\"storeName\": \"Amazon\",\n\"storeURL\": \"https:://www.amazon.com\",\n\"totalPrice\": \"9999.99\",\n\"payment\": {\n\"data\": {\n\"paymentId\": 1,\n\"transaction_tracking_id\": \"\",\n\"merchant_reference\": \"1\",\n\"status\": \"\"\n}\n},\n\"shipments\": {\n\"data\": [\n{\n\"shipmentId\": 1,\n\"status\": \"In warehouse\",\n\"comment\": \"No comment\",\n\"date\": \"2016-07-21 11:25:24\"\n},\n{\n\"shipmentId\": 2,\n\"status\": \"On Transit\",\n\"comment\": \"Expected to arrive in 3 days\",\n\"date\": \"2016-07-21 11:26:46\"\n},\n{\n\"shipmentId\": 3,\n\"status\": \"Arrived\",\n\"comment\": \"Arrived at final checkpoint\",\n\"date\": \"2016-07-21 11:27:13\"\n},\n{\n\"shipmentId\": 4,\n\"status\": \"Delivered\",\n\"comment\": \"Received by the customer\",\n\"date\": \"2016-07-21 11:27:36\"\n}\n]\n},\n\"products\": {\n\"data\": [\n{\n\"productId\": 1,\n\"asinCode\": \"B01FFQEWE8\",\n\"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n\"price\": 9999.99,\n\"quantity\": 1,\n\"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n\"color\": \"Black\",\n\"weight\": \"67.50\",\n\"length\": \"999.99\",\n\"width\": \"999.99\",\n\"height\": \"800.00\",\n\"size\": \"50.00\"\n},\n{\n\"productId\": 2,\n\"asinCode\": \"B01FFQEWE8\",\n\"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n\"price\": 9999.99,\n\"quantity\": 1,\n\"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n\"color\": \"Black\",\n\"weight\": \"67.50\",\n\"length\": \"999.99\",\n\"width\": \"999.99\",\n\"height\": \"800.00\",\n\"size\": \"50.00\"\n},\n{\n\"productId\": 3,\n\"asinCode\": \"B01FFQEWE8\",\n\"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n\"price\": 9999.99,\n\"quantity\": 1,\n\"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n\"color\": \"Black\",\n\"weight\": \"67.50\",\n\"length\": \"999.99\",\n\"width\": \"999.99\",\n\"height\": \"800.00\",\n\"size\": \"50.00\"\n}\n]\n}\n},\n{\n\"cartId\": 2,\n\"storeName\": \"Amazon\",\n\"storeURL\": \"https:://www.amazon.com\",\n\"totalPrice\": \"9999.99\",\n\"payment\": {\n\"data\": {\n\"paymentId\": 2,\n\"transaction_tracking_id\": \"\",\n\"merchant_reference\": \"2\",\n\"status\": \"\"\n}\n},\n\"shipments\": {\n\"data\": []\n},\n\"products\": {\n\"data\": [\n{\n\"productId\": 4,\n\"asinCode\": \"B01FFQEWE8\",\n\"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n\"price\": 9999.99,\n\"quantity\": 1,\n\"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n\"color\": \"Black\",\n\"weight\": \"67.50\",\n\"length\": \"999.99\",\n\"width\": \"999.99\",\n\"height\": \"800.00\",\n\"size\": \"50.00\"\n},\n{\n\"productId\": 5,\n\"asinCode\": \"B01FFQEWE8\",\n\"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n\"price\": 9999.99,\n\"quantity\": 1,\n\"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n\"color\": \"Black\",\n\"weight\": \"67.50\",\n\"length\": \"999.99\",\n\"width\": \"999.99\",\n\"height\": \"800.00\",\n\"size\": \"50.00\"\n},\n{\n\"productId\": 6,\n\"asinCode\": \"B01FFQEWE8\",\n\"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n\"price\": 9999.99,\n\"quantity\": 1,\n\"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n\"color\": \"Black\",\n\"weight\": \"67.50\",\n\"length\": \"999.99\",\n\"width\": \"999.99\",\n\"height\": \"800.00\",\n\"size\": \"50.00\"\n}\n]\n}\n},\n{\n\"cartId\": 3,\n\"storeName\": \"Amazon\",\n\"storeURL\": \"https:://www.amazon.com\",\n\"totalPrice\": \"9999.99\",\n\"payment\": {\n\"data\": {\n\"paymentId\": 3,\n\"transaction_tracking_id\": \"\",\n\"merchant_reference\": \"3\",\n\"status\": \"\"\n}\n},\n\"shipments\": {\n\"data\": []\n},\n\"products\": {\n\"data\": [\n{\n\"productId\": 7,\n\"asinCode\": \"B01FFQEWE8\",\n\"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n\"price\": 9999.99,\n\"quantity\": 1,\n\"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n\"color\": \"Black\",\n\"weight\": \"67.50\",\n\"length\": \"999.99\",\n\"width\": \"999.99\",\n\"height\": \"800.00\",\n\"size\": \"50.00\"\n},\n{\n\"productId\": 8,\n\"asinCode\": \"B01FFQEWE8\",\n\"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n\"price\": 9999.99,\n\"quantity\": 1,\n\"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n\"color\": \"Black\",\n\"weight\": \"67.50\",\n\"length\": \"999.99\",\n\"width\": \"999.99\",\n\"height\": \"800.00\",\n\"size\": \"50.00\"\n},\n{\n\"productId\": 9,\n\"asinCode\": \"B01FFQEWE8\",\n\"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n\"price\": 9999.99,\n\"quantity\": 1,\n\"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n\"color\": \"Black\",\n\"weight\": \"67.50\",\n\"length\": \"999.99\",\n\"width\": \"999.99\",\n\"height\": \"800.00\",\n\"size\": \"50.00\"\n}\n]\n}\n},\n{\n\"cartId\": 4,\n\"storeName\": \"Amazon\",\n\"storeURL\": \"https:://www.amazon.com\",\n\"totalPrice\": \"9999.99\",\n\"payment\": {\n\"data\": {\n\"paymentId\": 4,\n\"transaction_tracking_id\": \"\",\n\"merchant_reference\": \"4\",\n\"status\": \"PENDING\"\n}\n},\n\"shipments\": {\n\"data\": []\n},\n\"products\": {\n\"data\": [\n{\n\"productId\": 10,\n\"asinCode\": \"B01FFQEWE8\",\n\"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n\"price\": 9999.99,\n\"quantity\": 1,\n\"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n\"color\": \"Black\",\n\"weight\": \"67.50\",\n\"length\": \"999.99\",\n\"width\": \"999.99\",\n\"height\": \"800.00\",\n\"size\": \"50.00\"\n},\n{\n\"productId\": 11,\n\"asinCode\": \"B01FFQEWE8\",\n\"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n\"price\": 9999.99,\n\"quantity\": 1,\n\"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n\"color\": \"Black\",\n\"weight\": \"67.50\",\n\"length\": \"999.99\",\n\"width\": \"999.99\",\n\"height\": \"800.00\",\n\"size\": \"50.00\"\n},\n{\n\"productId\": 12,\n\"asinCode\": \"B01FFQEWE8\",\n\"name\": \"Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV\",\n\"price\": 9999.99,\n\"quantity\": 1,\n\"url\": \"https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V\",\n\"color\": \"Black\",\n\"weight\": \"67.50\",\n\"length\": \"999.99\",\n\"width\": \"999.99\",\n\"height\": \"800.00\",\n\"size\": \"50.00\"\n}\n]\n}\n}\n]\n}",
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
          "content": "HTTP/1.1 500 Exception\n{\n     \"message\": \"Something went wrong\",\n     \"status_code\": 500,\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/CartsController.php",
    "groupTitle": "User_Extension"
  },
  {
    "type": "get",
    "url": "/api/users?include=carts",
    "title": "Fetch all users - Include carts",
    "version": "0.2.0",
    "name": "GetUsersIncludeCarts",
    "group": "User_Extension",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Users unique ID.</p>"
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
            "field": "roles",
            "description": "<p>Role of the User.</p>"
          },
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
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"data\": [\n  {\n         \"userId\": 1,\n         \"roles\": \"customer\",\n         \"name\": \"John Doe\",\n         \"email\": \"john.doe@gmail.com\",\n         \"carts\": [\n         {\n                    \"cartId\": 4,\n                    \"storeName\": \"Amazon\",\n                    \"storeURL\": \"https:://www.amazon.com\",\n                    \"totalPrice\": 9999.99,\n                    \"createdAt\": \"2016-07-21 11:27:36\"\n         }\n         ]\n     }\n     ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/UsersController.php",
    "groupTitle": "User_Extension"
  }
] });
