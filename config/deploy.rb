# config valid only for current version of Capistrano
lock '3.5.0'

set :application, 'dufilauweb'
set :repo_url, 'git@github.com:StephanieB/dufilauweb.git'

# Default value for :scm is :git
# set :scm, :git

# Default value for :linked_files is []
set :linked_files, fetch(:linked_files, []).push('web/wp-config.php')

# Default value for linked_dirs is []
set :linked_dirs, fetch(:linked_dirs, []).push('web/wp-content/themes/dufilauweb/build/*', 'web/wp-content/themes/dufilauweb/uploads/*')

# Default value for keep_releases is 5
set :keep_releases, 5
