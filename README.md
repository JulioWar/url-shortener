# Short URLs

[https://juliowar-shorturl.herokuapp.com/](https://juliowar-shorturl.herokuapp.com/)

![image](https://user-images.githubusercontent.com/6256473/140857513-cba8a7f6-1ba6-47e3-9aff-5e42f7f8620e.png)

## Installation
### Requirements
- Have Docker installed and running


### Install Dependencies and Laravel Sail
This command uses a small Docker container containing PHP and Composer to install the application's dependencies:
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
```

### Preparing the App to Run

1. Create the `.env` file based on the `.env.example`
```
cp .env.example .env
```

2. Start the docker container using Laravel Sail.
```
./vendor/bin/sail up -d
```
After running this command, The App should be available at `http://localhost`

3. Start a new shell on the docker container as root
```
./vendor/bin/sail root-shell
```

4. Generate the app key
```
php artisan key:generate 
```

5. Create Tables in the Database
```
php artisan migrate
```

## API Routes
Endpoint to return top 100 most frequently accessed URLs
```
/top.json
```

Endpoint to create a new short url 
```
/url.json
```

Route to redirect the user to the original url based on its alias.
```
/{alias}
```

After this, the app should be able to function normally.

## Challenges
- It was my first time using docker but Luckily for me Laravel Sail made it easy and smooth. I have to say though, I am not considered myself an expert on docker yet but I learnt  a new thing and  it is just the beginning to keep learning about new tools.
- When I first read the challenge description the first thing I knew was going to be tricky was the part of generating the random string. Because when generating a random string, there is always a possibility to cause collision. Finally I came up with this methods to avoid as much as possible that problem:
  - I created a unique string case sensitive column in the table (short_urls) to have the possibility of having two aliases with the same letters but with different lowercase or uppercase characters. So a string “SnYB67mA” and “SnYB67ma” should be considered different.
  - I created a function that could generate a random string between 5 and 8 characters long. This function only uses numbers, lower and upper case letters so it can be easily remembered by the user.


## Reasoning behind my design decisions
- I decided to use a framework and specifically Laravel, because I wanted to focus all my attention to the requirements of the challenge.
- I decided to use two table to store the data
    - First table (short_urls): To store every new short url generated by the API.
    - Second Table (site_visits): To store and update the visit count for every URL visited using the shorter url generated by the API. I thought this was the best approach because that way, the top 100 leaderboard was going to be easy to get and to show it on the web client. And also because the only thing I was going to do is update the visit count every time a short url is used.
- I decided I was going to use the Repository Pattern for this, so the logic and the persistence layer could be separated. And I combined that with dependency injection so the current implementation could be more easily changed.
- After finishing the API I decided to take a moment to design a simple sketch of the UI using Adobe XD so I could see right away how It was going to look like and focus on that while developing.
- I decided to use alpinejs as my main javascript library mostly because it is lightweight but also reactive. I wanted the page to load faster so that is why I used it.

## Future Improvements I would make with more time

- I would definitely implement queues to handle the update of the visit count per site so I can be sure they are processed sequentially.
- Maybe I would add transaction protection when updating the database. I didn't do it just because I am only updating one table in every method so if it fails, then nothing wrong could happen.
- I would add a feature so the short url could be saved on the clipboard when the api returns an ok status and I would show some kind of message so the user could know about that feature.
- I would implement some logic so the short urls could expire when the link is not visited for a long time. This so the alias could be available and be used to create a new short url.
- I would add more unit test to ensure everything is covered.
