# Basic Steganography
Simple encode & decode image with secret data using php. 

## Usage
 
 #### Encode
 
 Easy way
     
     $steganog = new Bacic();
     $steganog->encode('SECRET DATA', 'image_path.png'); // saves image on same path.
    
 To save encoded image on different path.
 
     $steganog->encode('SECRET DATA', 'image_path.png', 'new_image_path.png');
    
    
 #### Decode
    $steganog = new Basic();
    $secret = $steganog->decode('image_path.png');
   
   --
   
 ### On CLI
 
 Encode command

 
    php application steganog:encode -s "it works" -p tests/data/evil_morty.png
    

Decode command
    
    php application steganog:decode -p tests/data/evil_morty.png
   
    
 