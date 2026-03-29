# Sticky Notes Web

A web client for viewing sticky notes created by `com.vixalien.sticky`.

1. Specify the path to your sticky notes folder in `.env`: `NOTE_DIR=/home/leo/.local/share/com.vixalien.sticky/notes`
2. Install dependencies with `composer install`
3. Initialize database with `./run migrate`
4. Create a user with `./run create-user leo 1234`
5. Start the server with `./run server`
6. Open [http://localhost:8085]() in your browser
