$(function () {
    "use strict";
// Basic
        $('#mptcard').formatter({
          'pattern': '{{99}} {{9999}} {{9999}}',
          'persistent': true
        });
        $('#ooredoocard').formatter({
          'pattern': '{{9999}} {{9999}} {{9999}}',
          'persistent': true
        });
        $('#telenorcard').formatter({
          'pattern': '{{9999}} {{9999}} {{9999}} {{99}}',
          'persistent': true
        });
        $('#telenorcard2').formatter({
          'pattern': '{{9999}} {{9999}} {{9999}} {{99}}',
          'persistent': true
        });
        $('#date-demo').formatter({
          'pattern': '{{9999}}/{{99}}/{{99}}'
        });
        $('#time-demo').formatter({
          'pattern': '{{99}}:{{99}}'
        });
        $('#date-time').formatter({
          'pattern': '{{9999}}/{{99}}/{{99}} {{99}}:{{99}}'
        });
        $('#characters-demo').formatter({
          'pattern': '{{aaaaaaaaaa}}'
        });
        // Advanced
        
        $('#phone-demo').formatter({
          'pattern': '({{999}}) {{999}}-{{9999}}',
          'persistent': true
        });
        $('#phone-code').formatter({
          'pattern': '+91 {{999}}-{{999}}-{{999}}-{{9999}}',
          'persistent': true
        });
        
        $('#currency-demo').formatter({
          'pattern': '$ {{999}}-{{999}}-{{999}}.{{99}}',
          'persistent': true
        });
        $('#credit-demo').formatter({
          'pattern': '{{9999}}-{{9999}}-{{9999}}-{{9999}}',
          'persistent': true
        });
        
        $('#product-key').formatter({
          'pattern': 'm{{*}}-{{999}}-{{999}}-C{{99}}',
          'persistent': true
        });
        $('#purchase-code').formatter({
          'pattern': 'ISBN{{9999}}-{{9999}}-{{9999}}-{{9999}}',
          'persistent': true
        });
    });