# PHP Calculator

This is a simple web-based calculator built with PHP. The application allows users to perform basic arithmetic operations like addition, subtraction, multiplication, and division. The interface is served through HTML, and the logic for calculating the results is handled server-side using PHP.

## Project Structure

- **index.php**: Contains the main calculator logic and handles user input.
- **style.css** (optional): You can add your own CSS for styling the calculator's interface.

## Prerequisites

To run this project, you need:
- A web server with PHP support (e.g., [XAMPP](https://www.apachefriends.org/), [WAMP](https://www.wampserver.com/), or any other server with PHP installed).
- PHP version 7.0 or higher.

## Running the Application Locally

1. **Clone the repository**:
    ```bash
    git clone https://github.com/TheWadjet-dev/php-calculator.git
    cd php-calculator
    ```

2. **Place the files in your web server's directory** (e.g., `htdocs` if you're using XAMPP).

3. **Access the calculator**:
   Open your browser and go to `http://localhost/index.php` to start using the calculator.

## How to Use the Calculator

1. Enter two numbers in the input fields.
2. Choose the desired operation: Addition, Subtraction, Multiplication, or Division.
3. Click the "Calculate" button to see the result.

## Features

- **Addition**: Adds two numbers.
- **Subtraction**: Subtracts the second number from the first.
- **Multiplication**: Multiplies two numbers.
- **Division**: Divides the first number by the second, with a check for division by zero.

## Example

- **Input**: `Num1 = 5, Num2 = 3, Operation = Addition`
- **Output**: `Result = 8`

## License

This project is open-source and available under the MIT License.
