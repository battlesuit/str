bs.str
======

This tiny bundle includes the `str\Object` class which comes with rudimental string conversion methods.  
At the current state this class allows:
 
* Camelization
* Pascalization
* Humanization
* Lowerscore (kind of rails::underscore)
* Unqualify (remove namespace from qualified classname)

The battlesuit initor aliases `str\Object` to `Str`  
If not using the initor just `class_alias('str\Object', 'Str')`

There are three ways to use the given functionalities:

####The OOP-Way

    $str = new Str('have a beer');
    $str->pascalize()->read(); # => HaveABeer
    
####The Builder-Way

    Str::new_one('have_a_beer')->pascalize()->read(); # => HaveABeer
    
####The Function-Way

    str\pascalize('have_a_beer'); # => HaveABeer
    
##Examples

    namespace str {
      # All this functions are also usable in the other ways shown above

      pascalize('turn on the music'); # => TurnOnTheMusic
      camelize('turn on the music'); # => turnOnTheMusic
      humanize('aLongCamelizedString'); # => A long camelized string
      lowerscore('PascalizedClassName'); # => pascalized_class_name
      unqualify('my\long\namespace\to\Foo'); # => Foo
    }
