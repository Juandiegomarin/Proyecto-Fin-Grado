FROM amazoncorretto:17-alpine as builder
WORKDIR application 
ARG JAR_FILE=target/Proyecto-Fin-Grado-0.0.1-SNAPSHOT.jar
COPY ${JAR_FILE} Proyecto-Fin-Grado-0.0.1-SNAPSHOT.jar
VOLUME /tmp
RUN java -Djarmode=layertools -jar Proyecto-Fin-Grado-0.0.1-SNAPSHOT.jar extract

FROM amazoncorretto:17-alpine
ENV TZ=Europe/Madrid
RUN ln -snf "/usr/share/zoneinfo/$TZ/" "etc/localtime" && echo "$TZ" > "/etc/timezone"
WORKDIR application

COPY --from=builder application/dependencies/ ./
COPY --from=builder application/spring-boot-loader/ ./
COPY --from=builder application/snapshot-dependencies/ ./
COPY --from=builder application/application/ ./

EXPOSE 8080

ENTRYPOINT ["java","-Djava.security.egd=file:/dev/./urandom","-Dspring.profiles.active=pro","org.springframework.boot.loader.JarLauncher"]