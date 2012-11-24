<?php
/**
 * @todo complete upcased words are not supported or can cause buggy results
 * 
 */
class strTest extends test_case\Unit {
  function test_pascalization() {
    $this->assert_equal(str::pascalize('words separated by whitespaces'), 'WordsSeparatedByWhitespaces');
    $this->assert_equal(str::pascalize('Really   long   whitespaces and __ underscores'), 'ReallyLongWhitespacesAndUnderscores');
    $this->assert_equal(str::pascalize('words_separated_by_underscores'), 'WordsSeparatedByUnderscores');
    $this->assert_equal(str::pascalize('What_Do_weHave__Here'), 'WhatDoWeHaveHere');
    $this->assert_equal(str::pascalize('Now-we--separate-with-dashes'), 'NowWeSeparateWithDashes');
    $this->assert_equal(str::pascalize('--Mixed--_separation_characters__'), 'MixedSeparationCharacters');
    $this->assert_equal(str::pascalize('have_a_beer'), 'HaveABeer');
    $this->assert_equal(str::pascalize('what about high 44223 numbers'), 'WhatAboutHigh44223Numbers');
  }
  
  function test_humanization() {
    $this->assert_equal(str::humanize('PascalCasedWords'), 'Pascal cased words');
    $this->assert_equal(str::humanize('camelCasedWords'), 'Camel cased words');
    $this->assert_equal(str::humanize('mixed_in_some_Underscores'), 'Mixed in some underscores');
    $this->assert_equal(str::humanize('looong___under__scores'), 'Looong under scores');
    $this->assert_equal(str::humanize('having--some--dashes'), 'Having some dashes');
    $this->assert_equal(str::humanize('test with  many   whitespaces'), 'Test with many whitespaces');
  }
  
  function test_camelization() {
    $this->assert_equal(str::camelize('How is my driving'), 'howIsMyDriving');
    $this->assert_equal(str::camelize('PorterWants_His_Money'), 'porterWantsHisMoney');
    $this->assert_equal(str::camelize('come onBuddy'), 'comeOnBuddy');
    $this->assert_equal(str::camelize('having--some--dashes'), 'havingSomeDashes');
    //$this->assert_equal(str::camelize('BUNDLE_with-extras'), 'bundleWithExtras');
  }
  
  function test_lowerscore() {
    $this->assert_equal(str::lowerscore('PascalCasedWord'), 'pascal_cased_word');
    $this->assert_equal(str::lowerscore('Mixed_In_Some_Underscores'), 'mixed_in_some_underscores');
    $this->assert_equal(str::lowerscore('Mixed_in___some__LONG______underscores'), 'mixed_in___some__long______underscores');
    $this->assert_equal(str::lowerscore('with\namespaced\string'), 'with_namespaced_string');
    $this->assert_equal(str::lowerscore('With\Pascalized\Namespace'), 'with_pascalized_namespace');
    $this->assert_equal(str::lowerscore('give-me---Some-Dashes'), 'give_me___some_dashes');
    $this->assert_equal(str::lowerscore('String with whitespaces'), 'string_with_whitespaces');
    $this->assert_equal(str::lowerscore('Str   ing     with    many   whitespaces'), 'str_ing_with_many_whitespaces'); 
    $this->assert_equal(str::lowerscore('namespace\\\with\\\\many\\\\\backslashes'), 'namespace_with_many_backslashes');
  }
  
  function test_unqualification() {
    $this->assert_equal(str::unqualify('my\personal\namespace\TestCase'), 'TestCase');
    $this->assert_equal(str::unqualify('my\\\personal\\\\\namespace\\\\\\TestCase'), 'TestCase');
  }
}
?>