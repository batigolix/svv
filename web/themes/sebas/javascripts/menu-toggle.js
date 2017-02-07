/**
 * @file
 * Javascript for toggling the menu.
 */

(function ($, Drupal) {

  'use strict';

  /**
   * Adds summaries to the book outline form.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attaches summary behavior to book outline forms.
   */
  Drupal.behaviors.toggleMenu = {
    attach: function (context) {

      var body, masthead, menuToggle, siteNavigation, socialNavigation, siteHeaderMenu, resizeTimer;
      masthead = $('#masthead');
      menuToggle = masthead.find('#menu-toggle');
      siteHeaderMenu = masthead.find('#site-header-menu');
      siteNavigation = masthead.find('#site-navigation');
      socialNavigation = masthead.find('#social-navigation');

      // Enable menuToggle.
      (function () {

        // Return early if menuToggle is missing.
        if (!menuToggle.length) {
          return;
        }

        // Add an initial values for the attribute.
        menuToggle.add(siteNavigation).add(socialNavigation).attr('aria-expanded', 'false');

        menuToggle.on('click.twentysixteen', function () {
          $(this).add(siteHeaderMenu).toggleClass('toggled-on');
          $(this).add(siteNavigation).addClass('menu-toggled');

          // jscs:disable
          $(this).add(siteNavigation).add(socialNavigation).attr('aria-expanded', $(this).add(siteNavigation).add(socialNavigation).attr('aria-expanded') === 'false' ? 'true' : 'false');
          // jscs:enable
        });
      })();

    }
  };

})(jQuery, Drupal);
