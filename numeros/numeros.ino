#define A 31
#define B 33
#define C 43
#define D 41
#define E 39
#define f 37
#define G 35
#define DP 45

void setup() {
  pinMode(A, OUTPUT);
  pinMode(B, OUTPUT);
  pinMode(C, OUTPUT);
  pinMode(D, OUTPUT);
  pinMode(E, OUTPUT);
  pinMode(f, OUTPUT);
  pinMode(G, OUTPUT);
  pinMode(DP, OUTPUT);
}
void zero(){
  digitalWrite(A, LOW);
  digitalWrite(B, LOW);
  digitalWrite(C, LOW);
  digitalWrite(D, LOW);
  digitalWrite(E, LOW);
  digitalWrite(f, LOW);
  digitalWrite(G, HIGH);
  digitalWrite(DP, LOW);
  
}
void um(){
  digitalWrite(A, HIGH);
  digitalWrite(B, LOW);
  digitalWrite(C, HIGH);
  digitalWrite(D, LOW);
  digitalWrite(E, HIGH);
  digitalWrite(f, LOW);
  digitalWrite(G, HIGH);
  digitalWrite(DP, LOW);
  
}

void loop() {
  zero();
  delay(1000);
  um();
  delay(1000);

}
