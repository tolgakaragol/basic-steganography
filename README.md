# Basic Steganography
Simple encode & decode image with secret data using php.

As the project name it will be very simple. But it can be extendable for new encoding-decoding algorithm.

## Usage
 
 #### Encode
 
 Easy way
     
     $steganog = new BacicSteganog();
     $steganog->encode('SECRET DATA', 'image_path.png'); // saves image on same path.
    
 To save encoded image on diffrent path.
 
     $steganog->encode('SECRET DATA', 'image_path.png', 'new_image_path.png');
     
     
 Choosing encode algorithm on creating object or using setter method. 
    
    $steganog = new BacicSteganog(SteganographyAlgorithm::BASIC);
    
    $steganog->setAlgorithm(SteganographyAlgorithm::CUSTOM_ALGORITHM);
    
 #### Decode
    $steganog = new BacicSteganog();
    $secret = $steganog->decode('image_path.png');
    
or you may want change decode algorithm.
    
    $secret = $steganog->decode('image_path.png', SteganographyAlgorithm::CUSTOM_ALGORITHM);

 