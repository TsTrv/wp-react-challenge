# Required Tools
In order to be able to set up this challenge, you will need:
- Yarn - [How to install Yarn](https://classic.yarnpkg.com/en/docs/install/#debian-stable)
- Latest WP version - [Download Link](https://wordpress.org/download/)

# Setup
Start by cloning the project locally. Once the cloning is complete, create a new branch in the format {yyyy-mm-dd}-{name}.
## Wordpress steup
Extract the wordpress files downloaded in the previous step in the wp/ directory. **At the end of the extraction of the files all of them**, like wp-admin, wp-includes, wp-config-sample.php, etc... **should be located in the wp/ folder.**

Create a database, and restore it using the SQL file  **init.sql** located in the **wp-data** folder.

Create an .env file in the root folder, from the .env.sample one, and populate it with the correct values.

Set up the virtual host on your local machine like for a regular wordpress site.

Check the WordPress site is set correctly by accessing the Admin portal using the credentials bellow:
- WP Admin Url: wp/wp-admin
- WP Admin User: WRC
- WP Admin Password: DemoAdminPass

## React setup
Change directory to **frontend/**, then run **yarn install**. 

Create a new .env file based on the .env.sample located in the same directory. **Make sure to change the REACT_APP_WP_HOST variable to reflect the URL of your local WordPress instance.**

Run ```yarn start``` .

# What's given
In the react application we already provide a simple implementation of the interaction between the app and the WP instance. In this example we fetch the Posts that are in the WP site. 
You can find the definition of those in the src/API folder and the implementation in the src/components folder.

We take care of the CORS issue by allowing all origins in the content/mu-plugins/index.php file. Feel free to edit this file as you need to fulfill the requirements. 

Although we have a theme, it's not currently in use in any way, you can disregard it completely.

# Challenges
## Required
- Create a new CPT for Leads. 
    - It should contain:
        - Full name
        - Phone
        - Email
    - It should have:
        - Custom statuses: Pending, Contacted.
- Add a new REST API endpoint for the new CPT.
- List all *Contacted* leads on the react homepage.

## Bonus
- Add a form on the Homepage that:
    - Will allow inserting new leads
    - Will have email and phone validation
        - Phone format: (999) 999-999
- Implement a POST endpoint in the API to:
    - Validate phone and email
        - Phone format: (999) 999-999
    - Sanitize all fields
    - Add the new Lead in the DB
    - Send an email to the admin 

# Handover
Once you complete the challenges, push them to your new branch, create a Merge Request to Master, and send the MR link to your recruiter. 

# Good Luck! 