## done-today

Simple app that tracks what you have done every day. Used primarily for supporting developers for daily and weekly stand ups.

### To Do / Wishlist
- [ ] Implement some themeing
- [ ] Ajaxify everything
- [ ] Add colors to Resolutions
- [ ] Allow entering of several tasks at once
- [ ] Add some charts, graphs, and statistics to the dashboard
- [ ] Add ability to email daily, weekly, and monthly lists (sorted by resolution)?
- [ ] Implement templating integration for customizing links in the task description (mostly for Jira tickets...)
- [ ] Allow syncing to some central database that can correlate everyone's data?

### Requirements
* PHP >= 5.4
* Mysql
* Composer

### Installation

```bash
git clone git@github.com:chaseconey/done-today.git
composer install
php artisan migrate
```
