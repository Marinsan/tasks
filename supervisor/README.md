### Superviso CueWorker

Path:

````
/etc/supervisor/conf.d/tasks.marinsan.scool.cat
````

Local:

````
[program:laravel-worker-tasks-marinsan-scool-cat]
process_name=%(program_name)s_%(process_num)02d
command=php /home/marin/Code/Marinsan/tasks/artisan queue:work redis --sleep=3 --tries=3
autostart=true
autorestart=true
user=marin
numprocs=8
redirect_stderr=true
stdout_logfile=/home/marin/Code/Marinsan/tasks/storage/logs/worker.log
````

Producció:

````
[program:laravel-worker-tasks-marinsan-scool-cat]
process_name=%(program_name)s_%(process_num)02d
command=php /home/forge/tasks.marinsan.scool.cat/artisan queue:work redis --sleep=3 --tries=3
autostart=true
autorestart=true
user=forge
numprocs=8
redirect_stderr=true
stdout_logfile=/home/forge/tasks.marinsan.scool.cat/storage/logs/worker.log
````


### Supervisor Horizon

Local:

````
[program:horizon-tasks-marinsan-scool-cat]
process_name=%(program_name)s
command=php /home/marin/Code/Marinsan/tasks/artisan horizon
autostart=true
autorestart=true
user=marin
redirect_stderr=true
stdout_logfile=/home/marin/Code/Marinsan/tasks/storage/logs/horizon.log
````

Producció:

````
[program:horizon-tasks-marinsan-scool-cat]
process_name=%(program_name)s
command=php /home/forge/tasks.marinsan.scool.cat/artisan horizon
autostart=true
autorestart=true
user=forge
redirect_stderr=true
stdout_logfile=/home/forge/tasks.marinsan.scool.cat/storage/logs/horizon.log
````