## 1 Page Widget Site

This is a simple 1 page Laravel application that allows the user to order Widgets.

- The quantity of widgets
- The color the widgets
- The date by which the widgets are needed
- The type of widget the customer wants


## Validation

The Widget Order Form has some constraints and the validation will fail if these requirements are not met:

- Quantity of widget must be an integer
- Color of widget must be alphabetical
- Date by which the widget is needed must be a full week after todays current date
- Type of widget must also be alphabetical

### User Feedback

The User will be notified if their order is successful or if there are problems with their form values

### Installation

1. Create a localhost MySQL database 'widget' with a user 'widget' with the password 'widget'
2. Install Composer
3. Run `sudo composer update` in the Widget directory
4. Run `sudo chmod -R 777 app/storage` in the Widget directory
5. Run `sudo php artistan migrate` in the Widget directory to run the database migrations


