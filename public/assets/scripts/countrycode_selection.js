
    /*
    * Jquery Country Selector
    */
   var input = document.querySelector("#phone");
   window.intlTelInput(input, {
       allowDropdown: false,
       autoHideDialCode: false,
       autoPlaceholder: "off",
       dropdownContainer: document.body,
       excludeCountries: ["us"],
       formatOnDisplay: true,
    // geoIpLookup: function(callback) {
    //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    //     var countryCode = (resp && resp.country) ? resp.country : "";
    //     callback(countryCode);
    //   });
    // },
    //    hiddenInput: "full_number",
       initialCountry: "ae",
       localizedCountries: { 'ae': 'United Arab Emirates (‫الإمارات العربية المتحدة‬)' },
       nationalMode: true,
       // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
       placeholderNumberType: "MOBILE",
       preferredCountries: ['cn', 'jp'],
       separateDialCode: true,
       utilsScript: Globals.url+"/assets/scripts/utils.js",
   });

   var str = $('.iti__selected-flag').attr('title');
    $('#phone_code').val(str.split('+')[1]);


    var input2 = document.querySelector("#phone2");
    window.intlTelInput(input2, {
        allowDropdown: false,
        autoHideDialCode: false,
        autoPlaceholder: "off",
        dropdownContainer: document.body,
        excludeCountries: ["us"],
        formatOnDisplay: true,
        // geoIpLookup: function(callback) {
        //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
        //     var countryCode = (resp && resp.country) ? resp.country : "";
        //     callback(countryCode);
        //   });
        // },
        //    hiddenInput: "full_number",
        initialCountry: "ae",
        localizedCountries: { 'ae': 'United Arab Emirates (‫الإمارات العربية المتحدة‬)' },
        nationalMode: true,
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        placeholderNumberType: "MOBILE",
        preferredCountries: ['cn', 'jp'],
        separateDialCode: true,
        utilsScript: Globals.url+"/assets/scripts/utils.js",
    });

    var str = $('.iti__selected-flag').attr('title');
    $('#phone_code2').val(str.split('+')[1]);