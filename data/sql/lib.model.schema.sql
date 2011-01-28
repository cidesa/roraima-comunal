
-----------------------------------------------------------------------------
-- fortipfin
-----------------------------------------------------------------------------

CREATE SEQUENCE "fortipfin_seq";


CREATE TABLE "fortipfin"
(
  "codfin" VARCHAR(4)  NOT NULL,
  "nomext" VARCHAR(100)  NOT NULL,
  "nomabr" VARCHAR(10)  NOT NULL,
  "apofis" VARCHAR(1),
  "tipfin" VARCHAR(1),
  "montoing" NUMERIC(20,2),
  "montodis" NUMERIC(20,2),
  "montodisaux" NUMERIC(20,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fortipfin_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fortipfin" IS '';


COMMENT ON COLUMN "fortipfin"."id" IS 'Identificador Único del registro';

ALTER TABLE "acunidad" ALTER nomuni TYPE character varying(30);
        
ALTER TABLE "cadettra" ALTER numlot TYPE character varying;
        
ALTER TABLE "cadetent" ALTER numlot TYPE character varying;
        
ALTER TABLE "cadetsal" ALTER numlot TYPE character varying;
        