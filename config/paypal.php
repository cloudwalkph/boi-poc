<?php
return array(
    // set your paypal credential

    // developer account
    'client_id' => 'Af494ZYdKzYeYbENruXbnGI2j2eYK0jf2tmh--GvxyLTAC-U2kfeD6bGxm-VMljhqXwjlqnb_BcF5DYc',
    'secret'    => 'EH1_TCUA1NksJ8OsIAuBvKo3PdXY8g1I2YyGjO7ETGBrKZoIaJ3tK-QvJxby-GqKJWxNZJ5XKIMx66-J',

    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        // 'mode' => 'live',
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 300,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);