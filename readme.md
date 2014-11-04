## done-today

Simple app that tracks what you have done every day. Used primarily for supporting developers for daily and weekly stand ups.

### To Do / Wishlist
- [x] Implement some themeing
- [x] Ajaxify everything
- [x] Add comments to a task
- [x] Make dashboard panels data tables
- [ ] Add notifications
- [ ] Add reporting for different time periods
- [ ] Add gravatar functionality
- [ ] Integrate build tool
- [ ] Add colors to Resolutions
- [x] Allow entering of several tasks at once
- [x] Add some charts, graphs, and statistics to the dashboard
- [ ] Add ability to email daily, weekly, and monthly lists (sorted by resolution)?
- [ ] Implement templating integration for customizing links in the task description (mostly for Jira tickets...)
- [ ] Allow syncing to some central database that can correlate everyone's data?

### Requirements
* PHP >= 5.4
* Mysql
* Composer
* bower
* [bower-installer](https://www.npmjs.org/package/bower-installer)

### Installation

```bash
git clone git@github.com:chaseconey/done-today.git
composer install
php artisan migrate
bower install
bower-installer
```
