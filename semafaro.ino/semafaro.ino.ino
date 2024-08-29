#define vermelho1 31
#define amarelo1  33
#define verde1    35

#define vermelho2 37
#define amarelo2  39
#define verde2    41

void setup(){
  pinMode(vermelho1, OUTPUT);
  pinMode(amarelo1, OUTPUT);
  pinMode(verde1, OUTPUT);
  pinMode(vermelho2, OUTPUT);
  pinMode(amarelo2, OUTPUT);
  pinMode(verde2, OUTPUT);
}//toda função a ser executada uma única vez, se usa void setup

void loop(){//comportamento do arduino
//T1
  digitalWrite(vermelho1, HIGH);
  digitalWrite(amarelo1, LOW);
  digitalWrite(verde1, LOW);
  digitalWrite(vermelho2, LOW);
  digitalWrite(amarelo2, LOW);
  digitalWrite(verde2, HIGH);
  delay(3000);
//T2
  digitalWrite(vermelho1, HIGH);
  digitalWrite(amarelo1, LOW);
  digitalWrite(verde1, LOW);
  digitalWrite(vermelho2, LOW);
  digitalWrite(amarelo2, HIGH);
  digitalWrite(verde2, HIGH);
  delay(3000);
//T3
  digitalWrite(vermelho1, LOW);
  digitalWrite(amarelo1, LOW);
  digitalWrite(verde1, HIGH);
  digitalWrite(vermelho2, HIGH);
  digitalWrite(amarelo2, LOW);
  digitalWrite(verde2, LOW);
  delay(3000);
//T4
  digitalWrite(vermelho1, LOW);
  digitalWrite(amarelo1, HIGH);
  digitalWrite(verde1, HIGH);
  digitalWrite(vermelho2, HIGH);
  digitalWrite(amarelo2, LOW);
  digitalWrite(verde2, LOW);
  delay(3000);

}
