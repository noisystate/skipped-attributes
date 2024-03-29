## Skip array attributes in an elegant way

### Installation
```
composer require noisystate/skipped-attributes
```

### Basic usage

```php
$data = unskipped_attributes([
    'one' => 1,
    'two' => 2,
    'three' => $someCondition ? 3 : skip_attribute(),
]);
// If $someCondition is true
// $data contains ['one' => 1, 'two' => 2, 'three' => 3]
// Otherwise
// $data contains ['one' => 1, 'two' => 2]
```

### Why use it

It happens so often when you are building a definition-array and adding attributes conditionally to it.
This leads to using many if conditions and simplifying the definition not to confuse the code reader and enforcing him/her to walk through all these conditions even if he is not interested in that level of detail.  

This super simple library lets you define arrays with conditionally added attributes (key-value pairs) in a short simple format so that the code reader can have an overview about the array and the attributes inside it without having to walk through many if conditions.

### Example use case
This is a common use case for laravel developers when implementing FormRequest rules method, And you want the code reader to see the rules' definition array returned by the method directly without having him/her to walk through many if conditions.  
```php
// Using skipped-attributes

public function rules()
{
    return unskipped_attributes([
        'name' => 'required|string',
        'email' => 'required|email',
        'is_active' => $authenticatedUser->canSetActive() 
            ? 'required|boolean' 
            : skip_attribute(),
        'is_visible' => $authenticatedUser->canSetVisibility() 
            ? 'required|boolean' 
            : skip_attribute(),
        'subscription_ends_at' => $authenticatedUser->canSetSubscriptionExpiry() 
            ? 'required|date' 
            : skip_attribute(),  
    ]);

}
```
```php
// Without using skipped-attributes

public function rules()
{
    $rules = [
        'name' => 'required|string',
        'email' => 'required|email',
    ];
    
    if($authenticatedUser->canSetActive()){
        $rules['is_active'] = 'required|boolean'    
    }
    
    if($authenticatedUser->canSetVisibility()){
        $rules['is_visible'] = 'required|boolean';
    }
    
    if($authenticatedUser->canSetSubscriptionExpiry()){
        $rules['subscription_ends_at'] = 'required|date';
    }
    
    return $rules;
}
```

This is just one common use case, But you can use it so many other situations.


### If you don't like using the helper functions

```php
use Noisystate\SkippedAttributes\UnskippedAttributes;
use Noisystate\SkippedAttributes\SkippedAttribte;

$data = UnskippedAttributes::from([
    'one' => 1,
    'two' => 2,
    'three' => $someCondition ? 3 : new SkippedAttribte(),
])->all();
```

