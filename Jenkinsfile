pipeline {
    agent any

    environment {
        GIT_CREDENTIALS = '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'
        IMAGE_NAME = 'laravel-app'
    }

    stages {
        stage('Recuperation du code') {
            steps {
                git credentialsId: GIT_CREDENTIALS,  url: 'https://github.com/SarrMohamed/gestionreservations.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-dev --optimize-autoloader'
                sh 'npm install && npm run build'
            }
        }

        stage('Run Unit Tests') {
            steps {
                sh 'php artisan test'
            }
        }

        stage('Build Docker Image') {
            steps {
                sh "docker build -t ${IMAGE_NAME}:latest ."
            }
        }

        stage('Run Docker Container') {
            steps {
                sh "docker run -d --name laravel-container -p 8000:80 ${IMAGE_NAME}:latest"
            }
        }
    }

    post {
        success {
            echo "Pipeline terminé avec succès !"
        }
        failure {
            echo "Erreur dans le pipeline"
        }
    }
}




















//---------------------------------pipline complet
// pipeline {
//     agent any

//     environment {
//         DOCKER_IMAGE = 'your-dockerhub-username/laravel-app'
//     }

//     stages {
//         stage('Cloner le repo') {
//             steps {
//                 git 'https://github.com/your-repo/laravel.git'
//             }
//         }

//         stage('Installation des dépendances') {
//             steps {
//                 sh 'composer install --no-dev --optimize-autoloader'
//             }
//         }

//         stage('Tests unitaires') {
//             steps {
//                 sh './vendor/bin/phpunit'
//             }
//         }

//         stage('Analyse de code avec SonarQube') {
//             steps {
//                 sh 'sonar-scanner'
//             }
//         }

//         stage('Build et push Docker') {
//             steps {
//                 sh """
//                 docker build -t $DOCKER_IMAGE:latest .
//                 docker login -u your-dockerhub-username -p your-password
//                 docker push $DOCKER_IMAGE:latest
//                 """
//             }
//         }

//         stage('Déploiement avec Kubernetes') {
//             steps {
//                 sh 'kubectl apply -f deployment.yaml'
//                 sh 'kubectl apply -f service.yaml'
//                 sh 'kubectl apply -f ingress.yaml'
//             }
//         }
//     }
// }
