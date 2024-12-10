# FROM maven:3-amazoncorretto-17 as builder
# WORKDIR /application 
# COPY . .
# RUN mvn clean install
# RUN java -Djarmode=layertools -jar target/Proyecto-Fin-Grado-0.0.1-SNAPSHOT.jar extract

# FROM amazoncorretto:17-alpine
# ENV TZ=Europe/Madrid
# RUN ln -snf "/usr/share/zoneinfo/$TZ/" "etc/localtime" && echo "$TZ" > "/etc/timezone"
# WORKDIR /application

# COPY --from=builder /application/dependencies/ ./
# COPY --from=builder /application/spring-boot-loader/ ./
# COPY --from=builder /application/snapshot-dependencies/ ./
# COPY --from=builder /application/application/ ./
FROM maven:3-amazoncorretto-17-alpine AS build
COPY ./Proyecto-Fin-Grado .
RUN mvn clean package -DskipTests

FROM amazoncorretto:17-alpine-jdk 
COPY --from=build /target/Proyecto-Fin-Grado-0.0.1-SNAPSHOT.jar Proyecto-Fin-Grado-0.0.1-SNAPSHOT.jar
EXPOSE 8080
ENTRYPOINT ["java","-Djava.security.egd=file:/dev/./urandom","-Dspring.profiles.active=pro","org.springframework.boot.loader.launch.JarLauncher"]





