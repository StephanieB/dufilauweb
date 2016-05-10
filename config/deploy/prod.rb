# server-based syntax
# ======================
# Defines a single server with a list of roles and multiple properties.
# You can define all roles on a single server, or split them:

# server 'example.com', user: 'deploy', roles: %w{app db web}, my_property: :my_value
# Default deploy_to directory is /var/www/my_app_name
# set :deploy_to, '/var/www/my_app_name'

namespace :composer do
    desc "Install composer"
    task :install, :roles => :app do
        run "cd #{release_path}; curl -sS https://getcomposer.org/installer | php"
        run "cd #{release_path}; php composer.phar install"
    end
end

after "deploy", "composer:install"
after "deploy", "deploy:cleanup"
