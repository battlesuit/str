<?php
namespace str;

/**
 * @todo complete upcased words are not supported or can cause buggy results
 * 
 */
class BaseTest extends \test_case\Unit {
  function set_up() {
    $this->str = new Object();
  }
  
  function test_initial_state() {
    $this->assert_empty($this->str->read());
    $this->assert_string($this->str->read());
  }
  
  function test_write() {
    $this->str->write('hello world');
    $this->assert_equal($this->str->read(), 'hello world');
  }
  
  function test_reset() {
    $str = $this->str;
    
    $str->write('hello world');
    $this->assert_equal($str->read(), 'hello world');
    $this->assert_equal($str->pascalize()->read(), 'HelloWorld');
    $str->reset();
    $this->assert_equal($str->read(), 'hello world');
  }
  
  function test_origin() {
    $str = $this->str;
    
    $str->write('hello world');
    $str->pascalize();
    $this->assert_equal($str->read(), 'HelloWorld');
    $this->assert_equal($str->origin(), 'hello world');
  }
  
  function test_pascalization() {
    $this->assert_equal(pascalize('words separated by whitespaces'), 'WordsSeparatedByWhitespaces');
    $this->assert_equal(pascalize('Really   long   whitespaces and __ underscores'), 'ReallyLongWhitespacesAndUnderscores');
    $this->assert_equal(pascalize('words_separated_by_underscores'), 'WordsSeparatedByUnderscores');
    $this->assert_equal(pascalize('What_Do_weHave__Here'), 'WhatDoWeHaveHere');
    $this->assert_equal(pascalize('Now-we--separate-with-dashes'), 'NowWeSeparateWithDashes');
    $this->assert_equal(pascalize('--Mixed--_separation_characters__'), 'MixedSeparationCharacters');
    $this->assert_equal(pascalize('have_a_beer'), 'HaveABeer');
    $this->assert_equal(pascalize('what about high 44223 numbers'), 'WhatAboutHigh44223Numbers');
  }
  
  function test_humanization() {
    $this->assert_equal(humanize('PascalCasedWords'), 'Pascal cased words');
    $this->assert_equal(humanize('camelCasedWords'), 'Camel cased words');
    $this->assert_equal(humanize('mixed_in_some_Underscores'), 'Mixed in some underscores');
    $this->assert_equal(humanize('looong___under__scores'), 'Looong under scores');
    $this->assert_equal(humanize('having--some--dashes'), 'Having some dashes');
    $this->assert_equal(humanize('test with  many   whitespaces'), 'Test with many whitespaces');
  }
  
  function test_camelization() {
    $this->assert_equal(camelize('How is my driving'), 'howIsMyDriving');
    $this->assert_equal(camelize('PorterWants_His_Money'), 'porterWantsHisMoney');
    $this->assert_equal(camelize('come onBuddy'), 'comeOnBuddy');
    $this->assert_equal(camelize('having--some--dashes'), 'havingSomeDashes');
    //$this->assert_equal(camelize('BUNDLE_with-extras'), 'bundleWithExtras');
  }
  
  function test_lowerscore() {
    $this->assert_equal(lowerscore('PascalCasedWord'), 'pascal_cased_word');
    $this->assert_equal(lowerscore('Mixed_In_Some_Underscores'), 'mixed_in_some_underscores');
    $this->assert_equal(lowerscore('Mixed_in___some__LONG______underscores'), 'mixed_in___some__long______underscores');
    $this->assert_equal(lowerscore('with\namespaced\string'), 'with_namespaced_string');
    $this->assert_equal(lowerscore('With\Pascalized\Namespace'), 'with_pascalized_namespace');
    $this->assert_equal(lowerscore('give-me---Some-Dashes'), 'give_me___some_dashes');
    $this->assert_equal(lowerscore('String with whitespaces'), 'string_with_whitespaces');
    $this->assert_equal(lowerscore('Str   ing     with    many   whitespaces'), 'str_ing_with_many_whitespaces'); 
    $this->assert_equal(lowerscore('namespace\\\with\\\\many\\\\\backslashes'), 'namespace_with_many_backslashes');
  }
  
  function test_unqualification() {
    $this->assert_equal(unqualify('my\personal\namespace\TestCase'), 'TestCase');
    $this->assert_equal(unqualify('my\\\personal\\\\\namespace\\\\\\TestCase'), 'TestCase');
  }
}
?>